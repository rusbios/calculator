<?php

namespace App;

use Exception;

class FileResult
{
    private const PATH = 'result.csv';

    private $resource;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $resource = fopen(self::PATH, 'w+');

        if ($resource === false) {
            throw new Exception('failed to open file ' . self::PATH);
        }

        $this->resource = $resource;
    }

    public function addLine(array $data): void
    {
        fwrite($this->resource, join(';', $data)."\n");
    }
}
