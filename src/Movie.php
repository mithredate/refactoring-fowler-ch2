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
    private $_price;

    /**
     * Movie constructor.
     *
     * @param $title
     * @param $priceCode
     */
    public function __construct($title, $priceCode)
    {
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    /**
     * @return mixed
     */
    public function getPriceCode()
    {
        return $this->_price->getPriceCode();
    }

    /**
     * @param mixed $priceCode
     */
    public function setPriceCode($priceCode)
    {
        $this->_priceCode = $priceCode;
        switch ($priceCode) {
            case Movie::REGULAR:
                $this->_price = new RegularPrice();
                break;
            case Movie::NEW_RELEASE:
                $this->_price = new NewReleasePrice();
                break;
            case Movie::CHILDREN:
                $this->_price = new ChildrenPrice();
                break;
            default:
                throw new InvalidArgumentException("Incorrect Price Code");
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param $daysRented
     *
     * @return float|int
     */
    public function getCharge($daysRented)
    {
        return $this->_price->getCharge($daysRented);
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