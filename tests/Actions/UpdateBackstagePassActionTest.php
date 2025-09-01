<?php

declare(strict_types=1);

namespace Tests\Actions;

use GildedRose\Actions\Items\UpdateBackstagePassAction;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;

final class UpdateBackstagePassActionTest extends TestCase
{
    /** @test */
    public function it_increases_quality_by_1_when_sellIn_greater_than_10(): void
    {
        $item    = new ItemData(ItemType::BACKSTAGE_PASS->value, 15, 20);
        $updated = (new UpdateBackstagePassAction())->handle($item);

        $this->assertSame(14, $updated->sellIn);
        $this->assertSame(21, $updated->quality);
    }

    /** @test */
    public function it_increases_quality_by_2_when_sellIn_between_6_and_10(): void
    {
        $item    = new ItemData(ItemType::BACKSTAGE_PASS->value, 10, 20);
        $updated = (new UpdateBackstagePassAction())->handle($item);

        $this->assertSame(9, $updated->sellIn);
        $this->assertSame(22, $updated->quality);
    }

    /** @test */
    public function it_increases_quality_by_3_when_sellIn_between_0_and_5(): void
    {
        $item    = new ItemData(ItemType::BACKSTAGE_PASS->value, 5, 20);
        $updated = (new UpdateBackstagePassAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(23, $updated->quality);
    }

    /** @test */
    public function it_resets_quality_to_zero_after_sellIn_less_than_zero(): void
    {
        $item    = new ItemData(ItemType::BACKSTAGE_PASS->value, 0, 20);
        $updated = (new UpdateBackstagePassAction())->handle($item);

        $this->assertSame(-1, $updated->sellIn);
        $this->assertSame(0, $updated->quality);
    }

    /** @test */
    public function it_never_increases_quality_above_50(): void
    {
        $item    = new ItemData(ItemType::BACKSTAGE_PASS->value, 5, 49);
        $updated = (new UpdateBackstagePassAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(50, $updated->quality);
    }
}
