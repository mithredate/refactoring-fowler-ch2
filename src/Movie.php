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

    /**
     * @param $days
     *
     * @return float|int
     */
    public function getCharge($days)
    {
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($days > 2) {
                    $result += ($days - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $days * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($days > 3) {
                    $result += ($days - 3) * 1.5;
                }
                break;
        }

        return $result;
    }

    public function getFrequentRenterPoints($daysRented) {
        $result = 1;
        // add bonus for a two doy new release rental
        if(
            $this->getPriceCode() == Movie::NEW_RELEASE &&
            $daysRented > 1
        ) {
            $result++;
        }

        return $result;
    }
}