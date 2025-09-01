<?php

declare(strict_types=1);

namespace GildedRose\Actions\Items;

use GildedRose\Contracts\ItemUpdaterInterface;
use GildedRose\Data\ItemData;

class UpdateAgedBrieAction implements ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData
    {
        $item->sellIn--;

        if ($item->quality >= 50) {
            return $item;
        }

        $item->quality++;

        if ($item->sellIn < 0 && $item->quality < 50) {
            $item->quality++;
        }

        return $item;
    }
}
