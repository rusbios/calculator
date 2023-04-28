<?php

namespace App\Calculate;

class MultiplyCalculate implements CalculateInterface
{
    public function run(int $firs, int $two): float
    {
        return $firs * $two;
    }

    public function sign(): string
    {
        return '*';
    }
}
