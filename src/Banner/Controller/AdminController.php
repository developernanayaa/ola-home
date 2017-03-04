<?php
namespace Ola\Home\Banner\Controller;

use Ola\Controller\AbstractAdminController;
use Ola\Home\Banner\Service\ServiceInterface;
use Ola\Home\Banner\Form\Form;
use Zend\View\Model\ViewModel;
use Ola\View\Filter\Slugify;

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
     * @var Http
     */
    protected $adapter;
    
    /**
     * 
     * @var string
     */
    protected $bannerDir;
    
    /**
     * 
     * @param ServiceInterface $service
     * @param Form $form
     */
    public function __construct(ServiceInterface $service, Form $form)
    {
        $this->service = $service;
        
        $this->form = $form;
        
        $this->adapter = new \Zend\File\Transfer\Adapter\Http();
        
        $this->bannerDir = getcwd() . '/public/img/banner/';
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
        
        $viewModel = new ViewModel(array(
            'paginator' => $paginator,
            'page' => $page,
            'itemCount' => $paginator->getTotalItemCount(),
            'pageCount' => $paginator->count(),
            'queryParams' => $this->params()->fromQuery(),
            'routeParams' => $this->params()->fromRoute()
        ));
        
        $viewModel->setTemplate('ola/home/banner/admin/index');
        
        return $viewModel;
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function createAction()
    {
        parent::indexAction();
        
        if ($this->getRequest()->isPost()) {
            $data = array_merge($this->getRequest()
                ->getPost()
                ->toArray(), $this->getRequest()
                ->getFiles()
                ->toArray());
            
            // set form data
            $this->form->setData($data);
            
            // if form is valid
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                
                $filename = $this->getFileName($data->getHomePageBannerTitle());
                
                // add filter
                $this->adapter->addFilter('File\Rename', array(
                    'target' => $this->bannerDir . $filename,
                    'overwrite' => true
                ));
                
                // get file
                $file = $data->getHomePageBannerImage();
                
                $this->adapter->receive($file['name']);
                
                $data->setHomePageBannerImage('/img/banner/' . $filename);
                
                // save entity
                $entity = $this->service->save($data);
                
                // trigger event
                $this->getEventManager()->trigger('homePageBannerCreate', $this, array(
                    'entity' => $entity
                ));
                
                // set flash messenger
                $this->flashMessenger()->addSuccessMessage('Home Page Banner was saved');
                
                return $this->redirect()->toRoute('home-banner-admin-index');
            }
        }
        
        $viewModel = new ViewModel(array(
            'form' => $this->form
        ));
        
        $viewModel->setTemplate('ola/home/banner/admin/create');
        
        return $viewModel;
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function updateAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        if(! $entity) {
            $this->flashMessenger()->addErrorMessage($this->translate('Banner not found'));
            
            return $this->redirect()->toRoute('home-banner-admin-index');
        }
        
        $this->form->bind($entity);
        
        if ($this->getRequest()->isPost()) {
            $data = array_merge($this->getRequest()
                ->getPost()
                ->toArray(), $this->getRequest()
                ->getFiles()
                ->toArray());
            
            // set form data
            $this->form->setData($data);
            
            // if form is valid
            if ($this->form->isValid()) {
                $data = $this->form->getData();
                
                $filename = $this->getFileName($data->getHomePageBannerTitle());
                
                // add filter
                $this->adapter->addFilter('File\Rename', array(
                    'target' => $this->bannerDir . $filename,
                    'overwrite' => true
                ));
                
                // get file
                $file = $data->getHomePageBannerImage();
                
                $this->adapter->receive($file['name']);
                
                $data->setHomePageBannerImage('/img/banner/' . $filename);
                
                // save entity
                $entity = $this->service->save($data);
                
                // trigger event
                $this->getEventManager()->trigger('homePageBannerCreate', $this, array(
                    'entity' => $entity
                ));
                
                // set flash messenger
                $this->flashMessenger()->addSuccessMessage('Home Page Banner was saved');
                
                return $this->redirect()->toRoute('home-banner-admin-index');
            }
        }
        
        $viewModel = new ViewModel(array(
            'form' => $this->form
        ));
        
        $viewModel->setTemplate('ola/home/banner/admin/update');
        
        return $viewModel;
    }
    
    /**
     * 
     * @return \Zend\View\Model\ViewModel
     */
    public function deleteAction()
    {
        parent::indexAction();
        
        $id = $this->params()->fromRoute('id');
        
        $entity = $this->service->get($id);
        
        // if we do not have a banner
        if(! $entity) {
            $this->flashMessenger()->addErrorMessage($this->translate('Banner not found'));
        
            return $this->redirect()->toRoute('home-banner-admin-index');
        }
        
        // if we have a post
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('delete_confirmation', 'no');
        
            if ($del === 'yes') {
                // delete
                $this->service->delete($entity);
        
                // trigger event
                $this->getEventManager()->trigger('homePageBannerDelete', $this, array(
                    'entity' => $entity
                ));
        
                $this->flashMessenger()->addSuccessMessage('The banner was deleted');
            }
        
            // send back to index
            return $this->redirect()->toRoute('home-banner-admin-index');
        }
        
        $viewModel = new ViewModel(array(
            'entity' => $entity
        ));
        
        $viewModel->setTemplate('ola/home/banner/admin/delete');
        
        return $viewModel;
    }
    
    /**
     * 
     * @param unknown $title
     * @return string
     */
    protected function getFileName($title)
    {
        $filter = new Slugify();
    
        // rename file
        $fileinfo = $this->adapter->getFileInfo();
    
        $oldFilename = $fileinfo['homePageBannerImage']['name'];
    
        $filextArray = explode(".", $oldFilename);
    
        $extension = end($filextArray);
    
        $newFilename =  $filter->filter($title) . '.' . $extension;
    
        return $newFilename;
    }
}

