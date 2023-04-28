<?php

namespace App;

use Exception;

class FileData
{
    private $resource;

    /**
     * @throws Exception
     */
    public function __construct(string $path)
    {
        $resource = fopen($path, 'r');

        if ($resource === false) {
            throw new Exception("failed to open file $path");
        }

        $this->resource = $resource;
    }

    public function getData(): iterable
    {
        while ($data = fgetcsv($this->resource, null, ';')) {
            yield [
                (int)trim($data[0], '﻿'),
                (int)trim($data[1], '﻿'),
            ];
        }
    }
}
