<?php
namespace Ola\Home\Auction\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $homePageAuctionId;

    /**
     *
     * @var number
     */
    protected $auctionId;

    /**
     *
     * @var number
     */
    protected $dateAdded;

    /**
     *
     * @var Ola\Auction\Auction\Entity\Entity
     */
    protected $auctionEntity;

    /**
     *
     * @return the $homePageAuctionId
     */
    public function getHomePageAuctionId()
    {
        return $this->homePageAuctionId;
    }

    /**
     *
     * @return the $auctionId
     */
    public function getAuctionId()
    {
        return $this->auctionId;
    }

    /**
     *
     * @return the $dateAdded
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     *
     * @return the $auctionEntity
     */
    public function getAuctionEntity()
    {
        return $this->auctionEntity;
    }

    /**
     *
     * @param number $homePageAuctionId            
     */
    public function setHomePageAuctionId($homePageAuctionId)
    {
        $this->homePageAuctionId = $homePageAuctionId;
    }

    /**
     *
     * @param number $auctionId            
     */
    public function setAuctionId($auctionId)
    {
        $this->auctionId = $auctionId;
    }

    /**
     *
     * @param number $dateAdded            
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    /**
     *
     * @param \Auction\Entity\Ola\Auction\Auction\Entity\Entity $auctionEntity            
     */
    public function setAuctionEntity($auctionEntity)
    {
        $this->auctionEntity = $auctionEntity;
    }
}

