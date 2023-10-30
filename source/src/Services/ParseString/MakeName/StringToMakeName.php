<?php

declare(strict_types=1);

namespace App\Services\ParseString\MakeName;

use App\Services\ParseString\SingleInterface;

class StringToMakeName implements SingleInterface
{
    private string $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        if (empty($this->raw)) {
            $this->clean = '';

            return;
        }
        $pattern = '/[^а-яА-Яa-zA-Z0-9`_.,;@#%~ёЁ&\/\'\+\*\?\[\^\]$\(\)\{\}\=\!\<\>\|\:\-\s\\\]/u';
        $raw = str_replace(' ', ' ', $this->raw);
        $this->clean = trim(preg_replace($pattern, '', $raw));
    }

    public function get(): string
    {
        return $this->clean;
    }
}
