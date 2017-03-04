<?php
namespace Ola\Home\Banner\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Banner\Controller\AdminController;

class AdminControllerFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Ola\Home\Banner\Controller\AdminController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Ola\Home\Banner\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Ola\Home\Banner\Form\Form');
        
        return new AdminController($service, $form);
    }
}

