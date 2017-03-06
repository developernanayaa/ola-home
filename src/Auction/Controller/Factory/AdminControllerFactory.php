<?php
namespace Ola\Home\Auction\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Auction\Controller\AdminController;

class AdminControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Ola\Home\Auction\Controller\AdminController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Ola\Home\Auction\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Ola\Home\Auction\Form\Form');
        
        return new AdminController($service, $form);
    }
}

