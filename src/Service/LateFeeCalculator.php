<?php

namespace App\Service;

class LateFeeCalculator
{


    public function calculateLateFee(\DateTime $dueDate, \DateTime $returnDate): float|int
    {
        $interval = $dueDate->diff($returnDate);
        $days = $interval->days;
        if ($days <= 0) {
            return 0;
        }

        return $days * 0.5;
    }
}