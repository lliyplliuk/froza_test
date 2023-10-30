<?php

declare(strict_types=1);

namespace App\Services\ParseString\Inn;

use App\Services\ParseString\SingleInterface;

class StringToInn implements SingleInterface
{
    private int $cleanInn;
    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        preg_match('/\d{10,12}/',  $this->raw, $matches);
        $this->cleanInn = (int) $matches[0];
    }

    public function get(): int
    {
        return $this->cleanInn;
    }
}
