<?php


namespace OrderBundle\Test\Validators;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase
{

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($value, $expected)
    {
        $notEmptyValidator = new NumericValidator($value);

        $isValid = $notEmptyValidator->isValid();

        $this->assertEquals($expected, $isValid);
    }
    
    public function valueProvider()
    {
        return [
            'shouldNotBeValidWhenValueIsNotANumber' => ['value' => 'foo', 'expected' => false],
            'shoulddBeValidWhenValueIsANumber' => ['value' => 10, 'expected' => true],
            'shouldBeValidWhenValueIsADecimal' => ['value' => 10.2, 'expected' => true],
            'shouldBeValidWhenValueIsAStringNumber' => ['value' => '10', 'expected' => true],
            'shouldNotBeValidWhenValueIsEmpty' => ['value' => '', 'expected' => false]
        ];
    }
}