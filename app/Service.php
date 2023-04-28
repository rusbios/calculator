<?php

namespace App;

use App\Calculate\CalculateInterface;
use App\Calculate\FactoryCalculate;
use Exception;

class Service
{
    public function __construct(
        private readonly FactoryCalculate $factoryCalculate,
    )
    {
    }

    /**
     * @throws Exception
     */
    public function getFileData(string $path): FileData
    {
        return new FileData($path);
    }

    /**
     * @throws Exception
     */
    public function getCalculate(string $action): CalculateInterface
    {
        return $this->factoryCalculate->make($action);
    }

    public function getFileResult(): FileResult
    {
        return new FileResult();
    }
}
