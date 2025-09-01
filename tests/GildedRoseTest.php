<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\Enums\ItemType;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

final class GildedRoseTest extends TestCase
{
    /** @test */
    public function it_updates_all_items_quality_and_sellIn(): void
    {
        $items = [
            new Item(ItemType::AGED_BRIE->value, 2, 0),
            new Item(ItemType::DEFAULT->value, 5, 7),
        ];

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $this->assertEquals(1, $items[0]->sellIn);
        $this->assertGreaterThan(0, $items[0]->quality);

        $this->assertEquals(4, $items[1]->sellIn);
        $this->assertLessThan(7, $items[1]->quality);
    }
}
