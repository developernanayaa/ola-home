<?php
namespace Ola\Home\Banner\Entity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $homePageBannerId;

    /**
     *
     * @var string
     */
    protected $homePageBannerTitle;

    /**
     *
     * @var string
     */
    protected $homePageBannerUrl;

    /**
     *
     * @var string
     */
    protected $homePageBannerImage;

    /**
     *
     * @var string
     */
    protected $homePageBannerStatus;

    /**
     *
     * @var number
     */
    protected $homePageBannerOrder;

    /**
     *
     * @return the $homePageBannerId
     */
    public function getHomePageBannerId()
    {
        return $this->homePageBannerId;
    }

    /**
     *
     * @return the $homePageBannerTitle
     */
    public function getHomePageBannerTitle()
    {
        return $this->homePageBannerTitle;
    }

    /**
     *
     * @return the $homePageBannerUrl
     */
    public function getHomePageBannerUrl()
    {
        return $this->homePageBannerUrl;
    }

    /**
     *
     * @return the $homePageBannerImage
     */
    public function getHomePageBannerImage()
    {
        return $this->homePageBannerImage;
    }

    /**
     *
     * @return the $homePageBannerStatus
     */
    public function getHomePageBannerStatus()
    {
        return $this->homePageBannerStatus;
    }

    /**
     *
     * @return the $homePageBannerOrder
     */
    public function getHomePageBannerOrder()
    {
        return $this->homePageBannerOrder;
    }

    /**
     *
     * @param number $homePageBannerId            
     */
    public function setHomePageBannerId($homePageBannerId)
    {
        $this->homePageBannerId = $homePageBannerId;
    }

    /**
     *
     * @param string $homePageBannerTitle            
     */
    public function setHomePageBannerTitle($homePageBannerTitle)
    {
        $this->homePageBannerTitle = $homePageBannerTitle;
    }

    /**
     *
     * @param string $homePageBannerUrl            
     */
    public function setHomePageBannerUrl($homePageBannerUrl)
    {
        $this->homePageBannerUrl = $homePageBannerUrl;
    }

    /**
     *
     * @param string $homePageBannerImage            
     */
    public function setHomePageBannerImage($homePageBannerImage)
    {
        $this->homePageBannerImage = $homePageBannerImage;
    }

    /**
     *
     * @param string $homePageBannerStatus            
     */
    public function setHomePageBannerStatus($homePageBannerStatus)
    {
        $this->homePageBannerStatus = $homePageBannerStatus;
    }

    /**
     *
     * @param number $homePageBannerOrder            
     */
    public function setHomePageBannerOrder($homePageBannerOrder)
    {
        $this->homePageBannerOrder = $homePageBannerOrder;
    }
}

