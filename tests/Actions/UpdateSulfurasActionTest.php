<?php

declare(strict_types=1);

namespace Tests\Actions;

use GildedRose\Actions\Items\UpdateSulfurasAction;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;
use PHPUnit\Framework\TestCase;
use PHPUnit\Util\Test;

final class UpdateSulfurasActionTest extends TestCase
{
    /** @test */
    public function it_does_not_change_sell_in_or_quality(): void
    {
        $item    = new ItemData(ItemType::SULFURAS->value, 10, 80);
        $updated = (new UpdateSulfurasAction())->handle($item);

        $this->assertSame(10, $updated->sellIn);
        $this->assertSame(80, $updated->quality);
        $this->assertSame($item, $updated);
    }
}
