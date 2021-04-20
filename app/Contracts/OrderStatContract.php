<?php

namespace App\Contracts;

interface OrderStatContract
{
    //
    public function getDataCounts() : array;

    public function getOrderStatistics($by = null, $createdFrom = null, $createdTo = null);

    public function aggregateOrdersByMonth(bool $totalAmount = true, $year = null);

    public function aggregateOrdersByDay(bool $totalAmount = true, $by = null, $year = null);

    public function aggregateOrdersByWeekDay(bool $totalAmount = true, $by = null, $year = null);

    public function aggregateOrdersByWeekNumber(bool $totalAmount = true, $year = null);


}
