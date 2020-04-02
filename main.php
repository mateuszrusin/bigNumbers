<?php

class Runner {

    public static function run()
    {
        $firstNum = trim(readline("Enter first number:  "));
        $secondNum = trim(readline("Enter second number: "));

        $bigNumbers = new BigNumbers($firstNum, $secondNum);
            
        echo "Sum:                 " . $bigNumbers->sum() . "\n";
    }
}

class BigNumbers {
    
    private string $firstNum;
    private string $secondNum;
    private int $length;

    public function __construct(string $firstNum, string $secondNum)
    {
        $this->init($firstNum, $secondNum);
    }

    public function sum(): string 
    {
        $result = '';
        $transmission = 0;

        for ($i = $this->length - 1; $i >= 0; $i--)
        {
            $sum = (int) $this->firstNum[$i] + (int) $this->secondNum[$i] + $transmission;

            if ($sum >  9 && $i > 0)
            {
                $result = substr($sum, -1) . $result;
                $transmission = 1;
            }
            else 
            {
                $result = (string) $sum . $result;
                $transmission = 0;
            }
        }

        return $result;
    }

    private function init(string $firstNum, string $secondNum): void
    {
        $this->length = max([strlen($firstNum), strlen($secondNum)]);

        if (isset($firstNum[$this->length - 1])) 
        {
            $this->firstNum = $firstNum;
            $this->secondNum = str_pad($secondNum, $this->length, '0', STR_PAD_LEFT);
        } 
        else 
        {
            $this->firstNum = str_pad($firstNum, $this->length, '0', STR_PAD_LEFT);;
            $this->secondNum = $secondNum;
        }
    }
}

Runner::run();
