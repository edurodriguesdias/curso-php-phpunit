<?php

namespace OrderBundle\Test\Entity;

use OrderBundle\Entity\Item;
use OrderBundle\Entity\Restaurant;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @dataProvider itemIsAvailableDataProvider
     */
    public function testItemIsAvailable($isRestaurantOpened, $isItemAvailable, $expected)
    {
        $restaurant = new Restaurant(
            'Los Pollos Hermanos',
            $isRestaurantOpened
        );

        $item = new Item(
            'chicken fries',
            $isItemAvailable,
            20,
            $restaurant
        );

        $isAvailable = $item->isAvailable();

        $this->assertEquals($expected, $isAvailable);
    }

    public function itemIsAvailableDataProvider()
    {
        return [
            'shouldBeAvailableWhenRestaurantIsOpened' => [
                'isRestaurantOpened' => true,
                'isItemAvailable' => true,
                'expected' => true
            ],
            'shouldNotBeAvailableWhenRestauranteIsNotOpened' => [
                'isRestaurantOpened' => false,
                'isItemAvailable' => true,
                'expected' => false
            ],
            'shouldNotBeAvailableWhenItemIsNotAvailable' => [                
                'isRestaurantOpened' => true,
                'isItemAvailable' => false,
                'expected' => false
            ]
        ];
    }
}