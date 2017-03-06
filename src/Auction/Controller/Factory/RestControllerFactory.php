<?php
namespace Ola\Home\Auction\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Auction\Controller\RestController;

class RestControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Ola\Home\Auction\Controller\RestController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        return new RestController($service, $form);
    }
}

