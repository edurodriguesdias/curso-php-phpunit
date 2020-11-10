<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    /**
     * @dataProvider customerAllowedDataProvider
     */
    public function testIsAllowedToOrder($isActive, $isBlocked, $expected)
    {
        $customer = new Customer(
            $isActive,
            $isBlocked,
            'Walter White',
            '5511992392039'
        );

        $isAllowed = $customer->isAllowedToOrder();

        $this->assertEquals($expected, $isAllowed);
    }


    public function customerAllowedDataProvider()
    {
        return [
            'shouldBeAllowedWhenCustomerIsNotBlocked' => [
                'isActive' => true,
                'isBlocked' => false,
                'expected' => true
            ],
            'shouldNotBeAllowedWhenCustomerIsBlocked' => [
                'isActive' => true,
                'isBlocked' => true,
                'expected' => false
            ],
            'shouldNotBeAllowedWhenCustomerIsNotActive' => [
                'isActive' => false,
                'isBlocked' => false,
                'expected' => false
            ]
        ];
    }
}