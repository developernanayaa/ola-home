<?php
namespace Ola\Home\Auction\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Ola\Home\Auction\Form\Form;

class FormFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Ola\Home\Auction\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        return new Form();
    }
}

