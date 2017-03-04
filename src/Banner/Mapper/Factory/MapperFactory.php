<?php
namespace Ola\Home\Banner\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;
use Ola\Home\Banner\Mapper\Mapper;
use Ola\Home\Banner\Hydrator\Hydrator;
use Ola\Home\Banner\Entity\Entity;

class MapperFactory
{
    
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
        
        $hydrator->add(new Hydrator());
        
        $prototype = new Entity();
        
        $writeAdapter = $serviceLocator->get('db1');
        
        $readAdapter = $serviceLocator->get('db2');
        
        return new Mapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }
}

