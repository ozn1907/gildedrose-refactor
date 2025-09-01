<?php

declare(strict_types=1);

namespace Tests\Actions;

use GildedRose\Actions\Items\ItemUpdateAction;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;

final class ItemUpdateActionTest extends TestCase
{
    /** @test */
    public function test_updates_aged_brie(): void
    {
        $item        = new ItemData(ItemType::AGED_BRIE->value, 10, 20);
        $updatedItem = (new ItemUpdateAction())->handle($item);

        $this->assertSame(ItemType::AGED_BRIE->value, $updatedItem->name);
        $this->assertLessThanOrEqual(10, $updatedItem->sellIn);
        $this->assertGreaterThan(20, $updatedItem->quality);
    }

    /** @test */
    public function test_updates_backstage_pass(): void
    {
        $item        = new ItemData(ItemType::BACKSTAGE_PASS->value, 10, 20);
        $updatedItem = (new ItemUpdateAction())->handle($item);

        $this->assertSame(ItemType::BACKSTAGE_PASS->value, $updatedItem->name);
        $this->assertLessThan(10, $updatedItem->sellIn);
        $this->assertGreaterThan(20, $updatedItem->quality);
    }

    /** @test */
    public function test_updates_sulfuras(): void
    {
        $item        = new ItemData(ItemType::SULFURAS->value, 10, 80);
        $updatedItem = (new ItemUpdateAction())->handle($item);

        $this->assertSame(80, $updatedItem->quality);
        $this->assertSame(10, $updatedItem->sellIn);
    }

    /** @test */
    public function test_updates_default_item(): void
    {
        $item        = new ItemData(ItemType::DEFAULT->value, 5, 7);
        $updatedItem = (new ItemUpdateAction())->handle($item);

        $this->assertSame(ItemType::DEFAULT->value, $updatedItem->name);
        $this->assertLessThan(5, $updatedItem->sellIn);
        $this->assertLessThan(7, $updatedItem->quality);
    }
}
