<?php
namespace Ola\Home\Banner\View\Helper\Factory;

use Ola\Home\Banner\Service\ServiceInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Banner\View\Helper\Slider;

class SliderFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Ola\Home\Banner\View\Helper\Slider
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Ola\Home\Banner\Service\ServiceInterface');
        
        return new Slider($service);
    }
}

