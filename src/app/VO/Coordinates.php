<?php

namespace App\VO;

use InvalidArgumentException;

class Coordinates
{
    public function __construct(
        public readonly float $lat,
        public readonly float $lon,
    ) {
        if ($lat < -90 || $lat > 90) {
            throw new InvalidArgumentException('Некорректная широта.');
        }
        if ($lon < -180 || $lon > 180) {
            throw new InvalidArgumentException('Некорректная долгота.');
        }
    }
}
