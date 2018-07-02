<?php
/**
 * Filename: Movie.
 * User: Mithredate
 * Date: Jul, 2018
 */

class Movie
{
    const CHILDREN = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $_title;
    private $_priceCode;

    /**
     * Movie constructor.
     *
     * @param $title
     * @param $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    /**
     * @return mixed
     */
    public function getPriceCode()
    {
        return $this->_priceCode;
    }

    /**
     * @param mixed $priceCode
     */
    public function setPriceCode($priceCode)
    {
        $this->_priceCode = $priceCode;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }


}