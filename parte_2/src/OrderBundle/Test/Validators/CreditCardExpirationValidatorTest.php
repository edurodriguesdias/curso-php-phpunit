<?php

namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expected)
    {
        $creditCardExpirationDate = new \DateTime($value);

        $creditCardExpirationValidator = new CreditCardExpirationValidator($creditCardExpirationDate);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertEquals($expected, $isValid);
    }

    public function valueProvider()
    {
        return [
            'shouldBeValidWhenDateIsNotExpired' => ['value' => '2050-12-31', 'expected' => true],
            'shouldNotBeValidWhenDateIsExpired' => ['value' => '2000-12-31',  'expected' => false]
        ];
    }
}