<?php

declare(strict_types=1);

namespace GildedRose\Actions\Items;

use GildedRose\Contracts\ItemUpdaterInterface;
use GildedRose\Data\ItemData;

class UpdateDefaultItemAction implements ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData
    {
        $item->sellIn--;

        if ($item->quality > 0) {
            $item->quality--;
        }

        if ($item->sellIn < 0 && $item->quality > 0) {
            $item->quality--;
        }

        return $item;
    }
}
