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
        
        $this->filter($filter)->sort($filter);
        
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

