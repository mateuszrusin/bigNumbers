<?php

namespace App;

class BigNumbers {
    
    public function factorial(string $n): string
    {
        if ($n < 2)
        {
            return '1';
        }

        $p = $this->diff($n, '1');
        $m = $this->factorial($p);

        return $this->multi($m, $n);
    }

    public function pow(string $x, string $y): string
    {
        if ($y < 1)
        {
            return '1';
        }

        $p = $this->diff($y, '1');
        $m = $this->pow($x, $p);

        return $this->multi($x, $m);
    }

    public function pow2(string $x, string $y): string
    {
        $result = '1';

        while ($y)
        {
            $result = $this->multi($result, $x);
            $y = $this->diff($y, '1');
        }

        return $result;
    }


    public function div(string $x, string $y): string
    {
        return 'Non implemented yet';
    }

    public function diff(string $x, string $y): string 
    {
        $diff = '';
        $result = '';
        $transmission = 0;

        [$x, $y, $sign] = $this->order($x, $y);

        for ($i = strlen($x) - 1; $i >= 0; $i--)
        {
            $diff = $x[$i] - $y[$i] - $transmission;
            
            if ($i > 0)
            {
                $transmission = (int) ($diff < 0);
                $result = ($diff + $transmission * 10) . $result;
            }    
        }

        return $sign . (ltrim($diff . $result, '0') ?: 0);
    }

    public function multi(string $x, string $y): string
    {
        $result = '';

        [$x, $y,] = $this->order($x, $y);
        $length = strlen($x) - 1;

        for ($i = $length; $i >= 0; $i--)
        {
            $product = '';
            $transmission = 0;
            for ($j = $length; $j >= 0; $j--)
            {
                $multi = $x[$i] * $y[$j] + $transmission;
                if ($j > 0)
                {
                    $transmission = intdiv($multi, 10);
                    $product = ($multi % 10) . $product;
                }
                else
                {
                    $product = $multi . $product;
                }
            }

            $result = $this->sum(
                $result, $this->pad_right($product, strlen($product) + $length - $i)
            );
        }

        return ltrim($result, '0');
    }

    public function sum(string $x, string $y): string
    {
        $sum = '';
        $result = '';
        $transmission = 0;

        [$x, $y,] = $this->order($x, $y);

        for ($i = strlen($x) - 1; $i >= 0; $i--)
        {
            $sum = $x[$i] + $y[$i] + $transmission;

            if ($i > 0)
            {
                $transmission = intdiv($sum, 10);
                $result = ($sum % 10) . $result;
            }
        }

        return $sum . $result;
    }

    private function order(string $x, string $y): array
    {
        $lenx = strlen($x);
        $leny = strlen($y);

        if ($lenx < $leny)
        {
            return [$this->pad_left($y, $leny), $this->pad_left($x, $leny), '-'];
        }

        if ($lenx === $leny)
        {
            for ($i = 0; $i < $lenx; $i++)
            {
                if ($x[$i] < $y[$i])
                {
                    return [$this->pad_left($y, $leny), $this->pad_left($x, $lenx), '-'];
                }
            }
        }

        return [$this->pad_left($x, $lenx), $this->pad_left($y, $lenx), ''];
    }

    private function pad_left(string $string, int $length): string
    {
        return str_pad($string, $length, '0', STR_PAD_LEFT);
    }

    private function pad_right(string $string, int $length): string
    {
        return str_pad($string, $length, '0', STR_PAD_RIGHT);
    }
}
