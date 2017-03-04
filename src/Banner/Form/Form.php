<?php
namespace Ola\Home\Banner\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Ola\Home\Banner\Hydrator\Hydrator;
use Ola\Home\Banner\Entity\Entity;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @param string $name            
     * @param array $options            
     */
    function __construct($name = 'home-page-banner-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->setHydrator(new Hydrator(false));
        
        $this->setObject(new Entity());
        
        $this->setAttribute('method', 'post');
        
        $this->setAttribute('enctype', 'multipart/form- data');
        
        $this->add(array(
            'name' => 'homePageBannerId',
            'type' => 'hidden'
        ));
        
        $this->add(array(
            'name' => 'homePageBannerTitle',
            'type' => 'Text',
            'options' => array(
                'label' => 'Title:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'tabindex' => 1
            )
        ));
        
        $this->add(array(
            'name' => 'homePageBannerUrl',
            'type' => 'Text',
            'options' => array(
                'label' => 'Link:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'tabindex' => 1
            )
        ));
        
        $this->add(array(
            'name' => 'homePageBannerImage',
            'type' => 'File',
            'options' => array(
                'label' => 'Image:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'tabindex' => 2
            )
        ));
        
        $this->add(array(
            'name' => 'homePageBannerStatus',
            'type' => 'Select',
            'options' => array(
                'label' => 'Status:',
                'value_options' => array(
                    '1' => 'Enabled',
                    '0' => 'Disabled'
                )
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'tabindex' => 3
            )
        ));
        
        $this->add(array(
            'name' => 'homePageBannerOrder',
            'type' => 'Text',
            'options' => array(
                'label' => 'Order:'
            ),
            'attributes' => array(
                'class' => 'form-control',
                'required' => 'required',
                'tabindex' => 4
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
        return array(
            // homePageBannerTitle
            'homePageBannerTitle' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Title is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // homePageBannerImage
            
            // homePageBannerUrl
            'homePageBannerUrl' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Url is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // homePageBannerStatus
            'homePageBannerStatus' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Status is required and cannot be empty."
                            )
                        )
                    )
                )
            ),
            
            // homePageBannerOrder
            'homePageBannerOrder' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'StripTags'
                    ),
                    array(
                        'name' => 'StringTrim'
                    )
                ),
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'break_chain_on_failure' => true,
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => "The Order is required and cannot be empty."
                            )
                        )
                    )
                )
            )
        );
    }
}

