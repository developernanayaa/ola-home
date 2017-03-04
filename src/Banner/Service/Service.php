<?php
namespace Ola\Home\Banner\Service;

use Ola\Home\Banner\Service\ServiceInterface;
use Ola\Home\Banner\Entity\Entity;
use Ola\Home\Banner\Mapper\MapperInterface;

class Service implements ServiceInterface
{

    /**
     *
     * @var MapperInterface
     */
    protected $mapper;

    /**
     *
     * @param MapperInterface $mapper            
     */
    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Banner\Service\ServiceInterface::getAll()
     */
    public function getAll($filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Banner\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Banner\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Ola\Home\Banner\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }
}

