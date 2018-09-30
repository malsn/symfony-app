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
    private $xml_id;

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
    public function getXmlId()
    {
        return $this->xml_id;
    }

    /**
     * @param int $xml_id
     */
    public function setXmlId($xml_id)
    {
        $this->xml_id = $xml_id;
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

