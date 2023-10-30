<?php

declare(strict_types=1);

namespace App\Services\ParseString\Float;

use App\Services\ParseString\SingleInterface;

class StringToFloat implements SingleInterface
{
    private float $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        $price = preg_replace("/[^,.0-9]/", '', $this->raw);
        $this->clean = (float)str_replace(",", ".", $price);
    }

    public function get(): float
    {
        return $this->clean;
    }
}
