<?php
/**
 * @author Piotr Strugacz <piotr.strugacz@xsolve.pl>
 */

namespace Ustrugany\FilterBundle\Model;


/**
 * Class DeveloperIdFilter
 * @package Ustrugany\FilterBundle\Model
 */
class DeveloperIdFilter implements FilterModelInterface
{
    /**
     * @var null|int
     */
    private $id;
    /**
     * @param null|int $id
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }
    /**
     * @inheritDoc
     */
    public function isImposed()
    {
        return null !== $this->id;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    function __toString()
    {
        return (string) $this->id;
    }
}