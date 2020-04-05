<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

class Runner {

    public static function run()
    {
        $x = trim(readline('Enter first number:  '));
        $y = trim(readline('Enter second number: '));

        $bigNumbers = new BigNumbers();

        echo 'Sum:                 ' . $bigNumbers->sum($x, $y) . "\n";
        echo 'Diff:                ' . $bigNumbers->diff($x, $y) . "\n";
        echo 'Multi:               ' . $bigNumbers->multi($x, $y) . "\n";
        echo "Factorial {$x}:      " . $bigNumbers->factorial($x) . "\n";
        echo "Factorial {$y}:      " . $bigNumbers->factorial($y) . "\n";
        echo 'Pow:                 ' . $bigNumbers->pow($x, $y) . "\n";
        echo 'Pow2:                ' . $bigNumbers->pow2($x, $y) . "\n";
    }
}

Runner::run();
