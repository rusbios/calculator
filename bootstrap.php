<?php

$files = [
    'app/Log.php',
    'app/FileResult.php',
    'app/FileData.php',
    'app/Calculate/CalculateInterface.php',
    'app/Calculate/DivisionCalculate.php',
    'app/Calculate/MinusCalculate.php',
    'app/Calculate/MultiplyCalculate.php',
    'app/Calculate/PlusCalculate.php',
    'app/Calculate/FactoryCalculate.php',
    'app/Service.php',
];

foreach ($files as $file) {
    include $file;
}
