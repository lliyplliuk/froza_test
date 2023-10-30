<?php

namespace App\Services\ParseString;

interface SingleInterface
{
    public function __construct(?string $raw);

    public function get();
}
