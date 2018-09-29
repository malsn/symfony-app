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
    private $flatRooms;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $building;


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
     * Set flatRooms
     *
     * @param integer $flatRooms
     *
     * @return Plus78Apartment
     */
    public function setFlatRooms($flatRooms)
    {
        $this->flatRooms = $flatRooms;

        return $this;
    }

    /**
     * Get flatRooms
     *
     * @return int
     */
    public function getFlatRooms()
    {
        return $this->flatRooms;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Plus78Apartment
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set building
     *
     * @param integer $building
     *
     * @return Plus78Apartment
     */
    public function setBuilding($building)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return int
     */
    public function getBuilding()
    {
        return $this->building;
    }
}

