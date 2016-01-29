<?php
/**
 * @author Piotr Strugacz <piotr.strugacz@xsolve.pl>
 */

namespace Ustrugany\FilterBundle\Model;


/**
 * Class FilterCollection
 * @package Ustrugany\FilterBundle\Model
 */
class FilterCollection
{
    private $filterModels;

    /**
     * @param $filterModels
     */
    public function __construct($filterModels)
    {
        $this->filterModels = $filterModels;
    }

    /**
     * @param string $name
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->filterModels)) {
            return $this->filterModels[$name];
        }
        return null;
    }

    /**
     * @param string $name
     * @param FilterModelInterface $value
     */
    function __set($name, FilterModelInterface $value)
    {
        var_dump('setting ' . $name);
        $this->filterModels[$name] = $value;
    }

    /**
     * @return mixed
     */
    public function getImposedModels()
    {
        return $this->getFilterModels(); //@todo fix later
    }

    /**
     * @return mixed
     */
    public function getFilterModels()
    {
        return $this->filterModels;
    }

    /**
     * @param FilterModelInterface $filterModel
     *
     * @return $this
     */
    public function addFilterModel(FilterModelInterface $filterModel)
    {
        $this->filterModels[] = $filterModel;

        return $this;
    }
}