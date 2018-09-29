<?php

namespace AppBundle\Entity;

/**
 * Plus78Building
 */
class Plus78Building
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $xmlid;

    /**
     * @var int
     */
    private $blockid;

    /**
     * @var string
     */
    private $name;


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
     * @return int
     */
    public function getXmlid()
    {
        return $this->xmlid;
    }

    /**
     * @param int $xmlid
     */
    public function setXmlid($xmlid)
    {
        $this->xmlid = $xmlid;
    }

    /**
     * @return int
     */
    public function getBlockid()
    {
        return $this->blockid;
    }

    /**
     * @param int $blockid
     */
    public function setBlockid($blockid)
    {
        $this->blockid = $blockid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Plus78Building
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

