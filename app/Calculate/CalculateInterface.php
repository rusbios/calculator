<?php

namespace App\Calculate;

interface CalculateInterface
{
    public const PLUS = 'plus';
    public const MINUS = 'minus';
    public const MULTIPLY = 'multiply';
    public const DIVISION = 'division';

    public function run(int $firs, int $two): float;

    public function sign(): string;
}
