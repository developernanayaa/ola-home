<?php
namespace Ola\Home\Banner\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Banner\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Ola\Home\Banner\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Ola\Home\Banner\Service\ServiceInterface');
        
        return new RestController($service);
    }
}

