<?php

declare(strict_types=1);

namespace GildedRose\Enums;

enum ItemType: string
{
    case AGED_BRIE      = 'Aged Brie';
    case BACKSTAGE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    case SULFURAS       = 'Sulfuras, Hand of Ragnaros';
    case DEFAULT        = 'Default';
}
