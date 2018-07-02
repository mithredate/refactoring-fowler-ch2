<?php
/**
 * Filename: Customer.
 * User: Mithredate
 * Date: Jul, 2018
 */

class Customer
{
    private $_name;
    private $_rentals;

    /**
     * Customer constructor.
     *
     * @param $name
     */
    public function __construct($name)
    {
        $this->_name = $name;
        $this->_rentals = array();
    }

    public function addRental($rental)
    {
        array_push($this->_rentals, $rental);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    public function statement()
    {
        $result = "Rental Record for {$this->getName()} \n";
        foreach ($this->_rentals as $aRental) {

            // show figure for this rental
            $result .= "\t {$aRental->getMovie()->getTitle()} \t {$aRental->getCharge()} \n";
        }

        //add footer lines
        $result .= "Amount owed is {$this->getTotalCharge()} \n";
        $result .= "You earned {$this->getFrequentRenterPoints()} frequent renter points";
        return $result;
    }

    private function getTotalCharge()
    {
        $result = 0;
        foreach ($this->_rentals as $aRental) {
            $result += $aRental->getCharge();
        }
        return $result;
    }

    private function getFrequentRenterPoints()
    {
        $result = 0;
        foreach ($this->_rentals as $aRental) {
            $result += $aRental->getFrequentRenterPoints();
        }
        return $result;
    }
}