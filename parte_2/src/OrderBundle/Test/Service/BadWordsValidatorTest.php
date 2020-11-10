<?php

namespace OrderBundle\Test\Service;

use OrderBundle\Service\BadWordsValidator;
use OrderBundle\Repository\BadWordsRepositoryInterface;

use PHPUnit\Framework\TestCase;

class BadWordsValidatorTest extends TestCase
{
    /**
     * @dataProvider badWordsDataProvider
     */
    public function testHasBadWords($message, $expected, $hasBadWordList)
    {
        $badWordList = [];

        if($hasBadWordList) {
            $badWordList = [
                'bobo', 'besta', 'chato', 'puto'
            ];
        }

        $badWordsRepository = $this->createMock(BadWordsRepositoryInterface::class);

        $badWordsRepository->method('findAllAsArray')->willReturn($badWordList);

        $badWordsValidator = new BadWordsValidator($badWordsRepository);

        $hasBadWords = $badWordsValidator->hasBadWords($message);

        $this->assertEquals($expected, $hasBadWords);
    }

    public function badWordsDataProvider()
    {
        return [
            'shouldNotBeValidWhenHasBadWords' => [
                'message' => 'você é muito bobo',
                'expected' => true,
                'hasBadWordList' => true
            ],
            'shouldBeValidWhenHasNoBadWords' => [
                'message' => 'Gostei muito desse restaurante',
                'expected' => false,
                'hasBadWordList' => true
            ],
            'shouldNotFoundWhenMessageIsEmpty' => [
                'message' => '',
                'expected' => false,
                'hasBadWordList' => true                
            ],
            'shouldNotFoundWhenBadWordsListIsEmpty' => [
                'message' => 'Estou muito puto com vocês',
                'expected' => false,
                'hasBadWordList' => false
            ]
        ];
    }
}
