<?php

declare(strict_types=1);

namespace App\Services\ParseString\Int;

use App\Services\ParseString\SingleInterface;

class StringToInt implements SingleInterface
{
    private int $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        $this->clean = (int)preg_replace("/[^0-9]/", '', $this->raw);
    }

    public function get(): int
    {
        return $this->clean;
    }
}
