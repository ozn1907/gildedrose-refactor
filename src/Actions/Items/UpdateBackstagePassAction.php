<?php

declare(strict_types=1);

namespace GildedRose\Actions\Items;

use GildedRose\Contracts\ItemUpdaterInterface;
use GildedRose\Data\ItemData;

class UpdateBackstagePassAction implements ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;

            return $item;
        }

        $increment = 1;

        if ($item->sellIn < 10) {
            $increment++;
        }

        if ($item->sellIn < 5) {
            $increment++;
        }

        $item->quality = min(50, $item->quality + $increment);

        return $item;
    }
}
