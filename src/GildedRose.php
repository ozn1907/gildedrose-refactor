<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Actions\Items\ItemUpdateAction;
use GildedRose\Data\ItemData;

final class GildedRose
{
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        $action = new ItemUpdateAction();

        foreach ($this->items as $item) {
            $dto     = new ItemData($item->name, $item->sellIn, $item->quality);
            $updated = $action->handle($dto);

            $item->sellIn  = $updated->sellIn;
            $item->quality = $updated->quality;
        }
    }
}
