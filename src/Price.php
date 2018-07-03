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

}