<?php

namespace AppBundle\Entity;

/**
 * Plus78Apartment
 */
class Plus78Apartment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $blockid;

    /**
     * @var int
     */
    private $buildingid;

    /**
     * @var int
     */
    private $section;

    /**
     * @var int
     */
    private $rooms;

    /**
     * @var float
     */
    private $stotal;

    /**
     * @var float
     */
    private $sroom;

    /**
     * @var float
     */
    private $skitchen;

    /**
     * @var float
     */
    private $sbalcony;

    /**
     * @var float
     */
    private $scorridor;

    /**
     * @var string
     */
    private $swatercloset;

    /**
     * @var float
     */
    private $height;

    /**
     * @var int
     */
    private $flattypeid;

    /**
     * @var string
     */
    private $decoration;

    /**
     * @var int
     */
    private $susidy;

    /**
     * @var int
     */
    private $creditend;

    /**
     * @var int
     */
    private $flatcostwithdiscounts;

    /**
     * @var int
     */
    private $baseflatcost;

    /**
     * @var int
     */
    private $flatfloor;

    /**
     * @var string
     */
    private $dateadded;

    /**
     * @var string
     */
    private $datemodified;

    /**
     * @var string
     */
    private $flatplan;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set blockid
     *
     * @param integer $blockid
     *
     * @return Plus78Apartment
     */
    public function setBlockid($blockid)
    {
        $this->blockid = $blockid;

        return $this;
    }

    /**
     * Get blockid
     *
     * @return int
     */
    public function getBlockid()
    {
        return $this->blockid;
    }

    /**
     * Set buildingid
     *
     * @param integer $buildingid
     *
     * @return Plus78Apartment
     */
    public function setBuildingid($buildingid)
    {
        $this->buildingid = $buildingid;

        return $this;
    }

    /**
     * Get buildingid
     *
     * @return int
     */
    public function getBuildingid()
    {
        return $this->buildingid;
    }

    /**
     * Set section
     *
     * @param integer $section
     *
     * @return Plus78Apartment
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return int
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set rooms
     *
     * @param integer $rooms
     *
     * @return Plus78Apartment
     */
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }

    /**
     * Get rooms
     *
     * @return int
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set stotal
     *
     * @param float $stotal
     *
     * @return Plus78Apartment
     */
    public function setStotal($stotal)
    {
        $this->stotal = $stotal;

        return $this;
    }

    /**
     * Get stotal
     *
     * @return float
     */
    public function getStotal()
    {
        return $this->stotal;
    }

    /**
     * Set sroom
     *
     * @param float $sroom
     *
     * @return Plus78Apartment
     */
    public function setSroom($sroom)
    {
        $this->sroom = $sroom;

        return $this;
    }

    /**
     * Get sroom
     *
     * @return float
     */
    public function getSroom()
    {
        return $this->sroom;
    }

    /**
     * Set skitchen
     *
     * @param float $skitchen
     *
     * @return Plus78Apartment
     */
    public function setSkitchen($skitchen)
    {
        $this->skitchen = $skitchen;

        return $this;
    }

    /**
     * Get skitchen
     *
     * @return float
     */
    public function getSkitchen()
    {
        return $this->skitchen;
    }

    /**
     * Set sbalcony
     *
     * @param float $sbalcony
     *
     * @return Plus78Apartment
     */
    public function setSbalcony($sbalcony)
    {
        $this->sbalcony = $sbalcony;

        return $this;
    }

    /**
     * Get sbalcony
     *
     * @return float
     */
    public function getSbalcony()
    {
        return $this->sbalcony;
    }

    /**
     * Set scorridor
     *
     * @param float $scorridor
     *
     * @return Plus78Apartment
     */
    public function setScorridor($scorridor)
    {
        $this->scorridor = $scorridor;

        return $this;
    }

    /**
     * Get scorridor
     *
     * @return float
     */
    public function getScorridor()
    {
        return $this->scorridor;
    }

    /**
     * Set swatercloset
     *
     * @param string $swatercloset
     *
     * @return Plus78Apartment
     */
    public function setSwatercloset($swatercloset)
    {
        $this->swatercloset = $swatercloset;

        return $this;
    }

    /**
     * Get swatercloset
     *
     * @return string
     */
    public function getSwatercloset()
    {
        return $this->swatercloset;
    }

    /**
     * Set height
     *
     * @param float $height
     *
     * @return Plus78Apartment
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set flattypeid
     *
     * @param integer $flattypeid
     *
     * @return Plus78Apartment
     */
    public function setFlattypeid($flattypeid)
    {
        $this->flattypeid = $flattypeid;

        return $this;
    }

    /**
     * Get flattypeid
     *
     * @return int
     */
    public function getFlattypeid()
    {
        return $this->flattypeid;
    }

    /**
     * Set decoration
     *
     * @param string $decoration
     *
     * @return Plus78Apartment
     */
    public function setDecoration($decoration)
    {
        $this->decoration = $decoration;

        return $this;
    }

    /**
     * Get decoration
     *
     * @return string
     */
    public function getDecoration()
    {
        return $this->decoration;
    }

    /**
     * Set susidy
     *
     * @param integer $susidy
     *
     * @return Plus78Apartment
     */
    public function setSusidy($susidy)
    {
        $this->susidy = $susidy;

        return $this;
    }

    /**
     * Get susidy
     *
     * @return int
     */
    public function getSusidy()
    {
        return $this->susidy;
    }

    /**
     * Set creditend
     *
     * @param integer $creditend
     *
     * @return Plus78Apartment
     */
    public function setCreditend($creditend)
    {
        $this->creditend = $creditend;

        return $this;
    }

    /**
     * Get creditend
     *
     * @return int
     */
    public function getCreditend()
    {
        return $this->creditend;
    }

    /**
     * Set flatcostwithdiscounts
     *
     * @param integer $flatcostwithdiscounts
     *
     * @return Plus78Apartment
     */
    public function setFlatcostwithdiscounts($flatcostwithdiscounts)
    {
        $this->flatcostwithdiscounts = $flatcostwithdiscounts;

        return $this;
    }

    /**
     * Get flatcostwithdiscounts
     *
     * @return int
     */
    public function getFlatcostwithdiscounts()
    {
        return $this->flatcostwithdiscounts;
    }

    /**
     * Set baseflatcost
     *
     * @param integer $baseflatcost
     *
     * @return Plus78Apartment
     */
    public function setBaseflatcost($baseflatcost)
    {
        $this->baseflatcost = $baseflatcost;

        return $this;
    }

    /**
     * Get baseflatcost
     *
     * @return int
     */
    public function getBaseflatcost()
    {
        return $this->baseflatcost;
    }

    /**
     * Set flatfloor
     *
     * @param integer $flatfloor
     *
     * @return Plus78Apartment
     */
    public function setFlatfloor($flatfloor)
    {
        $this->flatfloor = $flatfloor;

        return $this;
    }

    /**
     * Get flatfloor
     *
     * @return int
     */
    public function getFlatfloor()
    {
        return $this->flatfloor;
    }

    /**
     * Set dateadded
     *
     * @param string $dateadded
     *
     * @return Plus78Apartment
     */
    public function setDateadded($dateadded)
    {
        $this->dateadded = $dateadded;

        return $this;
    }

    /**
     * Get dateadded
     *
     * @return string
     */
    public function getDateadded()
    {
        return $this->dateadded;
    }

    /**
     * Set datemodified
     *
     * @param string $datemodified
     *
     * @return Plus78Apartment
     */
    public function setDatemodified($datemodified)
    {
        $this->datemodified = $datemodified;

        return $this;
    }

    /**
     * Get datemodified
     *
     * @return string
     */
    public function getDatemodified()
    {
        return $this->datemodified;
    }

    /**
     * Set flatplan
     *
     * @param string $flatplan
     *
     * @return Plus78Apartment
     */
    public function setFlatplan($flatplan)
    {
        $this->flatplan = $flatplan;

        return $this;
    }

    /**
     * Get flatplan
     *
     * @return string
     */
    public function getFlatplan()
    {
        return $this->flatplan;
    }
}

