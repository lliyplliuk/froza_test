<?php

declare(strict_types=1);

namespace App\Services\ParseString\InvoiceNumber;

use App\Services\ParseString\SingleInterface;

class StringToInvoiceNumber implements SingleInterface
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
        $raw = $this->raw;
        if (preg_match("/(?:№|Счет-фактура)\s*([A-Za-zа-яА-Я0-9-]+)\s*от/", $raw, $matches)) {
            $raw = trim($matches[1]);
        }
        $pattern = '/[^а-яА-Яa-zA-Z0-9`_.,;@#%~ёЁ&\/\'+*?\[^\]$(){}=!<>|:\-\s\\\]/u';
        $raw = str_replace(' ', ' ', $raw);
        $this->clean = trim(preg_replace($pattern, '', $raw));
    }

    public function get(): string
    {
        return $this->clean;
    }
}
