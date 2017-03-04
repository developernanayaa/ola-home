<?php
namespace Ola\Home\Banner\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Banner\Form\Form;

class FormFactory
{
    /**
     * 
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Ola\Home\Banner\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();        
    }
}

