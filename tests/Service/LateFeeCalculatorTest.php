<?php

namespace App\Tests\Service;
use PHPUnit\Framework\TestCase;
use App\Service\LateFeeCalculator;

class LateFeeCalculatorTest extends TestCase
{


    public function testCalculateLateFreeWithNoLate(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-04');
        $returnDate = new \DateTime('2024-01-01');

        $this->assertEquals(0, $calculator->calculateLateFee($returnDate, $returnDate));
    }

    public function testCalculateLateFreeTheSameDate(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-01');

        $this->assertEquals(0, $calculator->calculateLateFee($dueDate, $returnDate));
    }

    public function testCalculateLateFee(): void
    {
        $calculator = new LateFeeCalculator();
        $dueDate = new \DateTime('2024-01-01');
        $returnDate = new \DateTime('2024-01-04');

        $this->assertEquals(1.5, $calculator->calculateLateFee($dueDate, $returnDate));
    }


}