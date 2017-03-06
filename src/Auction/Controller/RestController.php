<?php
namespace Ola\Home\Auction\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Ola\Home\Auction\Service\ServiceInterface;
use Ola\Home\Auction\Form\Form;

class RestController extends AbstractRestfulController
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
     * @see \Zend\Mvc\Controller\AbstractRestfulController::create()
     */
    public function create($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::delete()
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::deleteList()
     */
    public function deleteList($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::get()
     */
    public function get($id)
    {
        $data = array();
    
    
        return new JsonModel(array(
            'content' => $data
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::getList()
     */
    public function getList()
    {
        $data = array();
    
        $filter = array(
            'pagination' => 'off'
        );
    
        $entitys = $this->service->getAll($filter);
    
        foreach($entitys as $entity) {
            $data[] = array(
               
            );
        }
    
        return new JsonModel(array(
            'content' => $data,
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::head()
     */
    public function head($id)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::options()
     */
    public function options()
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patch()
     */
    public function patch($id, $data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::replaceList()
     */
    public function replaceList($data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::patchList()
     */
    public function patchList($data)
    {
        $this->response->setStatusCode(405);
         
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::update()
     */
    public function update($id, $data)
    {
        $this->response->setStatusCode(405);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \Zend\Mvc\Controller\AbstractRestfulController::notFoundAction()
     */
    public function notFoundAction()
    {
        $this->response->setStatusCode(404);
    
        return new JsonModel(array(
            'content' => 'Method Not Allowed'
        ));
    }
}

