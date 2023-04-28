<?php

namespace App;

use DateTime;
use Exception;

class Log
{
    private static self $logger;

    private const PATH_FILE = 'log.log';

    private $resource;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        $resource = fopen(self::PATH_FILE, 'a');

        if ($resource === false) {
            throw new Exception('failed to open file ' . self::PATH_FILE);
        }

        $this->resource = $resource;
    }

    private static function init(): self
    {
        if (empty(self::$logger)) {
            self::$logger = new self();
        }

        return self::$logger;
    }

    public static function log(string $message, ?array $context = null): void
    {
        self::init()->addMessage($message, $context);
    }

    private function addMessage(string $message, ?array $context = null): void
    {
        $data = $context === null ? '' : json_encode($context);

        fwrite($this->resource, sprintf(
            "[%s] %s %s \n",
            (new DateTime())->format('Y-m-d H:i:s'),
            $message,
            $data,
        ));
    }
}
