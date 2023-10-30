<?php

declare(strict_types=1);

namespace App\Services\ParseString\DetailNum;

use App\Services\ParseString\SingleInterface;

class StringToDetailNum implements SingleInterface
{
    private string $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        $this->clean = mb_strtoupper(preg_replace('/[^a-zA-ZА-я\d]+/iu', '', $this->raw));
    }

    public function get(): string
    {
        return $this->clean;
    }
}
