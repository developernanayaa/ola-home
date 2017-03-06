<?php
namespace Ola\Home\Auction\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    function __construct($name = 'home-page-auction-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->setAttribute('method', 'post');
        
        $this->add(array(
            'name' => 'homePageBannerId',
            'type' => 'hidden'
        ));
        
        $this->add(array(
            'name' => 'auctionId',
            'type' => 'Text',
            'options' => array(
                'label' => 'Auction:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'id' => 'auctionId'
            )
        ));
        
        // button
        $this->add(array(
            'name' => 'submitForm',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submitForm',
                'class' => 'btn btn-primary'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }
}

