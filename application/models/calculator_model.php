<?php

class Calculator_Model extends CI_Model
{

    private $allowed_operand = array(
        'add' => '+',
        'subtract' => '-',
        'multiply' => 'x',
        'divide' => '÷'
    );

    public function operand()
    {
        return $this->allowed_operand;
    }

    public function operation($firstNumber, $secondNumber, $operand)
    {

        switch ($operand)
        {
            case "add":
                return $firstNumber + $secondNumber;
                break;
            case "subtract":
                return $firstNumber - $secondNumber;
                break;
            case "multiply":
                return $firstNumber * $secondNumber;
                break;
            case "divide":
                return $firstNumber / $secondNumber;
                break;
        }

    }

}