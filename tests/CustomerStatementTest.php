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
            "Rental Record for John Doe \n\t Dances with the wolves \t 2 \nAmount owed is 2 \nYou earned 1 frequent renter points",
            $customer->statement()
        );
    }

    public function testRegularTypeWith5Days()
    {
        $movie = new Movie("Dances with the wolves", Movie::REGULAR);
        $rental = new Rental($movie, 5);
        $customer = new Customer("John Doe");

        $customer->addRental($rental);

        $this->assertEquals(
            "Rental Record for John Doe \n\t Dances with the wolves \t 6.5 \nAmount owed is 6.5 \nYou earned 1 frequent renter points",
            $customer->statement()
        );
    }

    public function testACombinationOfTypes()
    {
        $movie1 = new Movie("Movie 1", Movie::REGULAR);
        $movie2 = new Movie("Movie 2", Movie::CHILDREN);
        $movie3 = new Movie("Movie 3", Movie::REGULAR);
        $movie4 = new Movie("Movie 4", Movie::NEW_RELEASE);
        $movie5 = new Movie("Movie 5", Movie::NEW_RELEASE);
        $movie6 = new Movie("Movie 6", Movie::CHILDREN);

        $customer1 = new Customer("Customer 1");
        $customer2 = new Customer("Customer 2");

        $customer1->addRental(new Rental($movie1, 5));
        $customer1->addRental(new Rental($movie3, 2));
        $customer1->addRental(new Rental($movie5, 6));
        $customer2->addRental(new Rental($movie2, 9));
        $customer2->addRental(new Rental($movie4, 3));
        $customer2->addRental(new Rental($movie6, 1));

        $this->assertEquals("Rental Record for Customer 1 \n	 Movie 1 	 6.5 \n	 Movie 3 	 2 \n	 Movie 5 	 18 \nAmount owed is 26.5 \nYou earned 4 frequent renter points", $customer1->statement());
        $this->assertEquals("Rental Record for Customer 2 \n	 Movie 2 	 10.5 \n	 Movie 4 	 9 \n	 Movie 6 	 1.5 \nAmount owed is 21 \nYou earned 4 frequent renter points", $customer2->statement());
    }
}