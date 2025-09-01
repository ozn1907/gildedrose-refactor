<?php

declare(strict_types=1);

namespace Tests\Actions;

use GildedRose\Actions\Items\UpdateDefaultItemAction;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Test;

final class UpdateDefaultItemTest extends TestCase
{
    /** @test */
    public function it_decreases_quality_and_sellIn_before_sell_date(): void
    {
        $item    = new ItemData(ItemType::DEFAULT->value, 5, 10);
        $updated = (new UpdateDefaultItemAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(9, $updated->quality);
    }

    /** @test */
    public function it_decreases_quality_twice_as_fast_after_sell_date(): void
    {
        $item    = new ItemData(ItemType::DEFAULT->value, 0, 10);
        $updated = (new UpdateDefaultItemAction())->handle($item);

        $this->assertSame(-1, $updated->sellIn);
        $this->assertSame(8, $updated->quality);
    }

    /** @test */
    public function quality_never_goes_below_zero(): void
    {
        $item    = new ItemData(ItemType::DEFAULT->value, 5, 0);
        $updated = (new UpdateDefaultItemAction())->handle($item);

        $this->assertSame(4, $updated->sellIn);
        $this->assertSame(0, $updated->quality);
    }

    /** @test */
    public function quality_never_goes_below_zero_even_after_sell_date(): void
    {
        $item    = new ItemData(ItemType::DEFAULT->value, 0, 1);
        $updated = (new UpdateDefaultItemAction())->handle($item);

        $this->assertSame(-1, $updated->sellIn);
        $this->assertSame(0, $updated->quality);
    }
}
