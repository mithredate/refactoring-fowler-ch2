<?php
/**
 * Filename: ChildrensPrice.
 * User: Mithredate
 * Date: Jul, 2018
 */

class ChildrenPrice extends Price
{

    public function getPriceCode()
    {
        return Movie::CHILDREN;
    }

    public function getCharge($daysRented)
    {
        $result = 1.5;
        if ($daysRented > 3) {
            $result += ($daysRented - 3) * 1.5;
        }
        return $result;
    }
}