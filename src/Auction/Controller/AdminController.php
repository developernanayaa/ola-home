<?php
namespace Ola\Home\Auction\Controller;

use Ola\Controller\AbstractAdminController;
use Ola\Home\Auction\Service\ServiceInterface;
use Ola\Home\Auction\Form\Form;
use Zend\View\Model\ViewModel;

class AdminController extends AbstractAdminController
{
    /**
     * 
     * @var ServiceInterface
     */
    protected $service;
    
    /**
     * 
     * @var Form
     */
    protected $form;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Ola\Controller\AbstractAdminController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();
        
        $viewModel = new ViewModel();
        
        return $viewModel;
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function createAction()
    {
        parent::indexAction();
        
        $viewModel = new ViewModel();
        
        return $viewModel;
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        parent::indexAction();
        
        $viewModel = new ViewModel();
        
        return $viewModel;
    }
}

