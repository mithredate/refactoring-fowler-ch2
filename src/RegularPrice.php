<?php
/**
 * Filename: RegularPrice.
 * User: Mithredate
 * Date: Jul, 2018
 */

class RegularPrice extends Price
{

    public function getPriceCode()
    {
        return Movie::REGULAR;
    }

    public function getCharge($daysRented)
    {

        $result = 2;
        if ($daysRented > 2) {
            $result += ($daysRented - 2) * 1.5;
        }
        return $result;
    }
}