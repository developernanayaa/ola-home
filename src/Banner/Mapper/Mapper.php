<?php
namespace Ola\Home\Banner\Mapper;

use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Ola\Mapper\AbstractMysqlMapper;
use Ola\Home\Banner\Entity\Entity;

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
     * @param unknown $filter            
     * @return \Zend\Db\ResultSet\ResultSet|\Zend\Paginator\Paginator
     */
    public function getAll($filter)
    {
        $this->select = $this->readSql->select('home_page_banner');
        
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
     * @param unknown $id            
     * @return \Ola\Mapper\ArrayObject|\Ola\Mapper\NULL
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('home_page_banner');
        
        $this->select->where(array(
            'home_page_banner.home_page_banner_id = ?' => $id
        ));
        
        return $this->getRow();
    }

    /**
     *
     * @param Entity $entity            
     * @return \Ola\Mapper\ArrayObject|\Ola\Mapper\NULL
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
        
        if ($entity->getHomePageBannerId()) {
            $this->update = new Update('home_page_banner');
            
            $this->update->set($postData);
            
            $this->update->where(array(
                'home_page_banner.home_page_banner_id = ?' => $entity->getHomePageBannerId()
            ));
            
            $this->updateRow();
        } else {
            $this->insert = new Insert('home_page_banner');
            
            $this->insert->values($postData);
            
            $id = $this->createRow();
            
            $entity->setHomePageBannerId($id);
        }
        
        return $this->get($entity->getHomePageBannerId());
    }

    /**
     *
     * @param Entity $entity            
     * @return boolean
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('home_page_banner');
        
        $this->delete->where(array(
            'home_page_banner.home_page_banner_id = ?' => $entity->getHomePageBannerId()
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

