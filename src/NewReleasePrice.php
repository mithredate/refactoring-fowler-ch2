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
}