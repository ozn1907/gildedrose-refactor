<?php

declare(strict_types=1);

namespace GildedRose\Actions\Items;

use GildedRose\Contracts\ItemUpdaterInterface;
use GildedRose\Data\ItemData;
use GildedRose\Enums\ItemType;

class ItemUpdateAction implements ItemUpdaterInterface
{
    public function handle(ItemData $item): ItemData
    {
        return match (ItemType::from($item->name)) {
            ItemType::AGED_BRIE      => (new UpdateAgedBrieAction())->handle($item),
            ItemType::BACKSTAGE_PASS => (new UpdateBackstagePassAction())->handle($item),
            ItemType::SULFURAS       => (new UpdateSulfurasAction())->handle($item),
            ItemType::DEFAULT        => (new UpdateDefaultItemAction())->handle($item),

        };
    }
}
