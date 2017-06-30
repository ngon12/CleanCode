<?php
namespace Scuti\CleanCodeExercise;

require_once(__DIR__ . '/../../../src/Scuti/CleanCodeExercise/FruitBasket.php');
use PHPUnit\Framework\TestCase;
use fruit_Basket as FruitBasket;

class FruitBasketTest extends TestCase
{
    const FRUITS = ['apple', 'banana', 'orange', 'durian'];

    public function testCanInstantiate()
    {
        $fruitBasket = new FruitBasket('me', self::FRUITS);
        $this->assertInstanceOf('fruit_Basket', $fruitBasket);

        return $fruitBasket;
    }

    /**
     * @depends testCanInstantiate
     */
    public function testIsIterable(FruitBasket $fruitBasket)
    {
        $i = 0;
        foreach ($fruitBasket as $fruit) {
            $this->assertSame(self::FRUITS[$i], $fruit);
            $i++;
        }
    }

    /**
     * @depends testCanInstantiate
     */
    public function testIsArrayAccessable(FruitBasket $fruitBasket)
    {
        for ($i = 0; $i < count(self::FRUITS); $i++) {
            $this->assertSame(self::FRUITS[$i], $fruitBasket[$i]);
        }
    }
}

