<?php
/**
 * Filename: Price.
 * User: Mithredate
 * Date: Jul, 2018
 */

abstract class Price
{
    abstract public function getPriceCode();

    abstract public function getCharge($daysRented);

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