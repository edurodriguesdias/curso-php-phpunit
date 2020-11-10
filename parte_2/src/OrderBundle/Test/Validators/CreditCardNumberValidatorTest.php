<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testisValid($value, $expected)
    {
        $creditCardValidator = new CreditCardNumberValidator($value);

        $isValid = $creditCardValidator->isValid();

        $this->assertEquals($expected, $isValid);
    }
    
    public function valueProvider()
    {
        return [
            'shouldBeValidWhenCardNumberIsCorrect' => ['value' => '9999999999999999', 'expected' => true],
            'shouldNotBeValidWhenCardNumberIsNotNumeric' => ['value' => 'ABCDEFHGIJKLMNOP', 'expected' => false],
            'shouldNotBeValidWhenCardNumberIsLessThanSixTeenDigits' => ['value' => '999999999999', 'expected' => false],
            'shouldNotBeValidWhenCardNumberIsGreaterThanSixTeenDigits' => ['value' => '99999999999999999999', 'expected' => false],
            'shouldBeValidWhenCardNumberIsAnInteger' => ['value' => 9999999999999999, 'expected' => true]
        ];
    }
}