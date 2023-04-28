<?php

namespace App\Calculate;

use Exception;

final class FactoryCalculate
{
    /**
     * @throws Exception
     */
    public function make(string $action): CalculateInterface
    {
        switch ($action) {
            case CalculateInterface::PLUS:
                return new PlusCalculate();

            case CalculateInterface::MINUS:
                return new MinusCalculate();

            case CalculateInterface::MULTIPLY:
                return new MultiplyCalculate();

            case CalculateInterface::DIVISION:
                return new DivisionCalculate();

            default:
                throw new Exception("Not found action '$action'");
        }
    }
}
