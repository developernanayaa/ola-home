<?php
namespace Ola\Home\Banner\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Ola\Home\Banner\Service\ServiceInterface;

class Slider extends AbstractHelper
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
    
    /**
     * 
     */
    public function __invoke()
    {
        $view = $this->getView();
        
        $partialHelper = $view->plugin('partial');
        
        $data = new \stdClass();
        
        $filter = array(
            'pagiation' => 'off'
        );
        
        $entitys = $this->service->getAll($filter);
        
        $data->entitys = $entitys;
        
        return $partialHelper('partials/slider.phtml', $data);
    }
}

