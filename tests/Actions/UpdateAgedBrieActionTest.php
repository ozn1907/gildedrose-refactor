<?php

declare(strict_types=1);

namespace Tests\Actions;

use GildedRose\Actions\Items\UpdateAgedBrieAction;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;

final class UpdateAgedBrieActionTest extends TestCase
{
    /** @test */
    public function it_increases_quality_by_1_before_sell_date(): void
    {
        $item    = new ItemData(ItemType::AGED_BRIE->value, 5, 10);
        $updated = (new UpdateAgedBrieAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(11, $updated->quality);
    }

    /** @test */
    public function it_increases_quality_by_2_after_sell_date(): void
    {
        $item    = new ItemData(ItemType::AGED_BRIE->value, 0, 10);
        $updated = (new UpdateAgedBrieAction())->handle($item);

        $this->assertSame(-1, $updated->sellIn);
        $this->assertSame(12, $updated->quality);
    }

    /** @test */
    public function it_does_not_increase_quality_above_50(): void
    {
        $item    = new ItemData(ItemType::AGED_BRIE->value, 5, 50);
        $updated = (new UpdateAgedBrieAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(50, $updated->quality);
    }

    /** @test */
    public function it_does_not_increase_quality_above_50_even_after_sell_date(): void
    {
        $item    = new ItemData(ItemType::AGED_BRIE->value, 0, 49);
        $updated = (new UpdateAgedBrieAction())->handle($item);

        $this->assertSame(-1, $updated->sellIn);
        $this->assertSame(50, $updated->quality);
    }
}
