<?php

namespace App\Calculate;

class DivisionCalculate implements CalculateInterface
{
    public function run(int $firs, int $two): float
    {
        if ($firs === 0 || $two === 0) {
            return 0;
        }

        return $firs / $two;
    }

    public function sign(): string
    {
        return '/';
    }
}
