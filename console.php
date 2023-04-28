<?php

use App\Calculate\FactoryCalculate;
use App\Log;
use App\Service;

include 'bootstrap.php';

$options = getopt('a:f::', [
    'action:',
    'file::',
]);

$file = $options['f'] ?? $options['file'] ?? 'test.csv';
$action = $options['a'] ?? $options['action'] ?? null;

if ($action === null) {
    echo "ERROR: action param not found\n\r";
    exit();
}

handle($file, $action);

function handle(string $file, string $action): void
{
    $service = new Service(new FactoryCalculate());

    try {
        $action = $service->getCalculate($action);
        $fileData = $service->getFileData($file);
        $fileResult = $service->getFileResult();
    } catch (Throwable $e) {
        Log::log($e->getMessage());
        echo 'ERROR: '.$e->getMessage()."\n\r";
        exit();
    }

    foreach ($fileData->getData() as $value) {
        $result = $action->run($value[0], $value[1]);

        if ($result < 0) {
            Log::log(sprintf('%s %s %s = %s', $value[0], $action->sign(), $value[1], $result));
        } else {
            $fileResult->addLine([$value[0], $value[1], $result]);
        }
    }
}
