<?php

namespace AppBundle\Entity;

/**
 * Plus78Block
 */
class Plus78Block
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
     * Set name
     *
     * @param string $name
     *
     * @return Plus78Block
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

