<?php
namespace Ola\Home\Auction\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;
use Ola\Home\Auction\Hydrator\Hydrator;
use Ola\Home\Auction\Entity\Entity;
use Ola\Home\Auction\Mapper\Mapper;

class MapperFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Ola\Home\Auction\Mapper\Mapper
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

