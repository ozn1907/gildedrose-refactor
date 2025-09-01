<?php

declare(strict_types=1);

namespace GildedRose\Contracts;

use GildedRose\Data\ItemData;

interface ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData;
}
