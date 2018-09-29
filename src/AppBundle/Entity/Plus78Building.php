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
     * @var Plus78Block
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
     * @return Plus78Block
     */
    public function getBlockid()
    {
        return $this->blockid;
    }

    /**
     * @param Plus78Block $blockid
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

