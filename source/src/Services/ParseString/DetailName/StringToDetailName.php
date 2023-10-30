<?php

declare(strict_types=1);

namespace App\Services\ParseString\DetailName;

use App\Services\ParseString\SingleInterface;

class StringToDetailName implements SingleInterface
{
    private string $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        $pattern = '/[^а-яА-Яa-zA-Z0-9`_.,;@#%~ёЁ&\/\'"\+\*\?\[\^\]$\(\)\{\}\=\!\<\>\|\:\-\s\\\]/u';
        $raw = str_replace(' ', ' ', $this->raw);
        $this->clean = trim(preg_replace($pattern, '', $raw));
    }

    public function get(): string
    {
        return $this->clean;
    }
}
