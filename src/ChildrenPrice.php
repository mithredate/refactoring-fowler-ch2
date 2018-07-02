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
}