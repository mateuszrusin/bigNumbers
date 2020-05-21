<?php

namespace App;

require_once __DIR__.'/../vendor/autoload.php';

class Runner {

    public static function run(): void
    {
        $x = Math::digits(readline('Enter first number:  '));
        $y = Math::digits(readline('Enter second number: '));

        $bigNumbers = new BigNumbers();

        echo 'For ' . $x . ' and ' . $y . ":\n";
        echo 'Sum:                 ' . $bigNumbers->sum($x, $y) . "\n";
        echo 'Diff:                ' . $bigNumbers->diff($x, $y) . "\n";
        echo 'Multi:               ' . $bigNumbers->multi($x, $y) . "\n";

        if (readline('Factorial ' . $x . '? y/n: ') == 'y') {
            echo "Factorial {$x}: " . $bigNumbers->factorial($x) . "\n";
        }

        if (readline('Factorial ' . $y . '? y/n: ') == 'y') {
            echo "Factorial {$y}: " . $bigNumbers->factorial($y) . "\n";
        }

        if (readline('Power ' . $x . '^' . $y . '? y/n: ') == 'y') {
            echo 'Pow:                 ' . $bigNumbers->pow($x, $y) . "\n";
        }
    }
}

Runner::run();
