<?php
/**
 * Filename: Rental.
 * User: Mithredate
 * Date: Jul, 2018
 */

class Rental
{
    private $_movie;
    private $_daysRented;

    /**
     * Rental constructor.
     *
     * @param $movie
     * @param $daysRented
     */
    public function __construct($movie, $daysRented)
    {
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->_movie;
    }

    /**
     * @return mixed
     */
    public function getDaysRented()
    {
        return $this->_daysRented;
    }

    /**
     * @return float|int
     */
    public function getCharge()
    {
        return $this->getMovie()->getCharge($this->getDaysRented());
    }

    public function getFrequentRenterPoints()
    {
        return $this->getMovie()->getFrequentRenterPoints($this->getDaysRented());
    }

}