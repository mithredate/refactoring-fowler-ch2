<?php
/**
 * Filename: NewReleasePrice.
 * User: Mithredate
 * Date: Jul, 2018
 */

class NewReleasePrice extends Price
{

    public function getPriceCode()
    {
        return Movie::NEW_RELEASE;
    }

    public function getCharge($daysRented)
    {
        return $daysRented * 3;
    }

    public function getFrequentRenterPoints($daysRented)
    {
        // add bonus for a two day new release rental
        return $daysRented > 1 ? 2 : 1;
    }
}