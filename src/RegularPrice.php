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
}