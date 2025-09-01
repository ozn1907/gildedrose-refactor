<?php

declare(strict_types=1);

namespace GildedRose\Actions\Items;

use GildedRose\Contracts\ItemUpdaterInterface;
use GildedRose\Data\ItemData;

class UpdateSulfurasAction implements ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData
    {
        return $item;
    }
}
