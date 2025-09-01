<?php

declare(strict_types=1);

namespace GildedRose\Data;

class ItemData
{
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality
    ) {
    }
}
