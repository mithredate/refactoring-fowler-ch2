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
        $result = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2) {
                    $result += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($this->getDaysRented() > 3) {
                    $result += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }

        return $result;
    }

}