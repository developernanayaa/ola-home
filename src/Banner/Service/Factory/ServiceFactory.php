<?php
namespace Ola\Home\Banner\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Banner\Service\Service;

class ServiceFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Ola\Home\Banner\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Ola\Home\Banner\Mapper\MapperInterface');
        
        return new Service($mapper);
    }
}

