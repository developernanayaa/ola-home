<?php
namespace Ola\Home\Auction\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Ola\Home\Auction\Mapper\MapperInterface;
use Ola\Mapper\AbstractMysqlMapper;
use Ola\Home\Auction\Entity\Entity;
use Zend\Db\Sql\Expression;

class Mapper extends AbstractMysqlMapper implements MapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter            
     * @param AdapterInterface $writeAdapter            
     * @param HydratorInterface $hydrator            
     * @param Entity $prototype            
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
        
        $this->prototype = $prototype;
        
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Auction\Mapper\MapperInterface::getAll()
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('home_page_auction');
        
        $this->joinAuction();
        
        $this->filter($filter)->sort($filter);
        
        $this->select->order('auction.auction_end_unixtime DESC');
        
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {
                return $this->getRows();
            }
        }
        
        return $this->getPaginator();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Auction\Mapper\MapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('home_page_auction');
        
        $this->select->where(array(
            'home_page_auction.home_page_auction_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Auction\Mapper\MapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        if ($entity->getHomePageAuctionId()) {
            $this->update = new Update('home_page_auction');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'home_page_auction.home_page_auction_id = ?' => $entity->getHomePageAuctionId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('home_page_auction');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setHomePageAuctionId($id);
        }
        
        return $this->get($entity->getHomePageAuctionId());
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Auction\Mapper\MapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('home_page_auction');
        
        $this->delete->where(array(
            'home_page_auction.home_page_auction_id = ?' => $entity->getHomePageAuctionId()
        ));
        
        return $this->deleteRow();
    }

    protected function joinAuction()
    {
        $this->select->join('auction', 'home_page_auction.auction_id = auction.auction_id', array(
            'auction_start_unixtime',
            'auction_end_unixtime',
            'auction_min_bid_value',
            'auction_current_bid_value',
            'auction_num_bids',
            'auction_heading',
            'auction_subtitle',
            'auction_featured_flag',
            'auction_reserve_flag',
            'auction_item_qty',
            'auction_item_qty_left',
            'auction_secure_flag',
            'auction_auto_relist_flag',
            'auction_end_early_flag',
            'auction_status',
            'auction_type',
            'auction_location_zip_code',
            'auction_offsite_flag',
            'auction_user_hidden_flag',
            'auction_relist_count',
            'auction_view_count',
            'auction_priority'
        ), 'inner');
        
        // join image
        $expression = new Expression('picture.auction_id = auction.auction_id AND picture.picture_delete_flag = 0 AND picture.picture_order = 1');
        
        $this->select->join('picture', $expression, array(
            'picture_id',
            'picture_url',
            'picture_order',
            'picture_mime_type',
            'picture_file_size',
            'picture_filename',
            'picture_delete_flag'
        ), 'inner');
        
        // join user
        $this->select->join('ola_user', 'auction.user_id = ola_user.user_id', array(
            'user_username'
        ), 'left');
        
        // join users feedback
        $this->select->join('user_feedback_cache', 'auction.user_id = user_feedback_cache.user_id', array(
            'user_feedback_rating'
        ), 'left');
        
        // join service
        $expresion = new Expression("service.user_id = auction.user_id AND service.service_type_id = 1 AND service.service_status = 'ACTIVE'");
        $this->select->join('service', $expresion, array(
            'product_module_id'
        ), 'left');
        
        return $this;
    }
    
    /**
     *
     * @param unknown $filter            
     * @return \Ola\Banner\Banner\Mapper\Mapper
     */
    protected function filter($filter)
    {
        return $this;
    }

    /**
     *
     * @param unknown $filter            
     * @return \Ola\Banner\Banner\Mapper\Mapper
     */
    protected function sort($filter)
    {
        return $this;
    }
}

