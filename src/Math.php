<?php


namespace App;


class Math
{
    static public function factorial(int $n): int {
        return ($n < 2) ? 1 : $n * static::factorial($n - 1);
    }

    static public function digits(string $n): string {
        return (string) preg_replace('/[^0-9]/', '', $n);
    }
}