<?php

namespace App\Enums;

enum AddressTypeEnum: int
{
    case BUILDING = 1;

    case DELIVERY = 2;

    public function label(): string
    {
        return match($this) {
            self::BUILDING => 'Адрес здания',
            self::DELIVERY => 'Адрес доставки', // представим, что может появиться доставка документов на адреса владельцев зданий
        };
    }
}
