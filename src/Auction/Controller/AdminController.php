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
        
       $page = $this->params()->fromQuery('page', 1);
        
        $countPerPage = $this->params()->fromQuery('count', 25);
        
        $filter = array(
            
        );
        
        $paginator = $this->service->getAll($filter);
        
        $paginator->setCurrentPageNumber($filter['page']);
        
        $paginator->setItemCountPerPage($filter['count-per-page']);
        
        $viewModel = new ViewModel(array(
            'paginator' => $paginator,
            'page' => $page,
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count(),
            'queryParams' => $this->params()->fromQuery(),
            'routeParams' => $this->params()->fromRoute()
        ));
        
        $viewModel->setTemplate('ola/home/auction/admin/index');
        
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
        
        $viewModel->setTemplate('ola/home/auction/admin/create');
        
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
        
        $viewModel->setTemplate('ola/home/auction/admin/delete');
        
        return $viewModel;
    }
}

