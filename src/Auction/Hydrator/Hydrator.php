<?php
namespace Ola\Home\Auction\Hydrator;

use Zend\Stdlib\Hydrator\ClassMethods;
use Ola\Home\Auction\Entity\Entity;

class Hydrator extends ClassMethods
{

    /**
     *
     * @param string $underscoreSeparatedKeys            
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::hydrate()
     */
    public function hydrate(array $data, $object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
        
        parent::hydrate($data, $object);
        
        // auction
        $auctionEntity = parent::hydrate($data, new \Ola\Auction\Auction\Entity\Entity());
              
        $object->setAuctionEntity($auctionEntity);
        
        // picture
        $pictureEntity = parent::hydrate($data, new \Ola\Media\Picture\Entity\Entity());
        
        $object->getAuctionEntity()->setPictureEntity($pictureEntity);
        
        // user
        $userEntity = parent::hydrate($data, new \Ola\User\User\Entity\Entity());
        
        $object->getAuctionEntity()->setUserEntity($userEntity);
        
        return $object;
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Stdlib\Hydrator\ClassMethods::extract()
     */
    public function extract($object)
    {
        if (! $object instanceof Entity) {
            return $object;
        }
        
        $data = parent::extract($object);
        
        unset($data['auction_entity']);
        
        return $data;
    }
}

