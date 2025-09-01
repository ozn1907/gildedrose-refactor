<?php

declare(strict_types=1);

namespace Tests\Data;

use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\TestCase;

final class ItemDataTest extends TestCase
{
    /** @test */
    public function it_creates_item_with_expected_properties(): void
    {
        $item = new ItemData(ItemType::AGED_BRIE->value, 10, 20);

        $this->assertSame(ItemType::AGED_BRIE->value, $item->name);
        $this->assertSame(10, $item->sellIn);
        $this->assertSame(20, $item->quality);
    }
}
