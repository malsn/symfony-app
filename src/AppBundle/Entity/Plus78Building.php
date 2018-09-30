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
    private $xml;

    /**
     * @var int
     */
    private $block;

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
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param int $xml
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    /**
     * @return int
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param int $block
     */
    public function setBlock($block)
    {
        $this->block = $block;
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

