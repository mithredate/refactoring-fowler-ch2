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
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for {$this->getName()} \n";
        for ($i = 0; $i < sizeof($this->_rentals); $i++) {
            $each = $this->_rentals[$i];

            $frequentRenterPoints += $each->getFrequentRenterPoints();

            // show figure for this rental
            $result .= "\t {$each->getMovie()->getTitle()} \t {$each->getCharge()} \n";
            $totalAmount += $each->getCharge();
        }

        //add footer lines
        $result .= "Amount owed is {$totalAmount} \n";
        $result .= "You earned {$frequentRenterPoints} frequent renter points";
        return $result;
    }
}