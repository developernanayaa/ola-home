<?php
namespace Ola\Home\Auction\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Auction\Service\Service;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Ola\Home\Auction\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Ola\Home\Auction\Mapper\MapperInterface');
        
        return new Service($mapper);
    }
}

