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
    
    private array $numbers = [];
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
            $sum = (int) $this->numbers[0][$i] + (int) $this->numbers[1][$i] + $transmission;
            $transmission = intdiv($sum, 10);
            
            if ($i > 0)
            {
                $result = ($sum % 10) . $result;
            }    
        }

        return $sum . $result;
    }

    private function init(string $firstNum, string $secondNum): void
    {
        $this->length = max([strlen($firstNum), strlen($secondNum)]);
        $this->numbers = [
            str_pad($firstNum, $this->length, '0', STR_PAD_LEFT), 
            str_pad($secondNum, $this->length, '0', STR_PAD_LEFT),
        ];
    }
}

Runner::run();
