<?php
/**
 * Filename: CustomerStatementTest.
 * User: Mithredate
 * Date: Jul, 2018
 */

require_once dirname(dirname(__FILE__)) . "/vendor/autoload.php";

class CustomerStatementTest extends \PHPUnit\Framework\TestCase
{
    public function testRegularTypeRentalWith2Days()
    {
        $movie = new Movie("Dances with the wolves", Movie::REGULAR);

        $rental = new Rental($movie, 2);

        $customer = new Customer("John Doe");
        $customer->addRental($rental);

        $this->assertEquals(
            "Rental Record for John Doe \n\t Dances with the wolves \t 2 \nAmount owed is 0 \nYou earned 1 frequent renter points",
            $customer->statement()
        );
    }
}