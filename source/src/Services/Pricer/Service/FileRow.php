<?php

declare(strict_types=1);

namespace App\Services\Pricer\Service;

use App\Services\ParseString\DetailName\StringToDetailName;
use App\Services\ParseString\DetailNum\StringToDetailNum;
use App\Services\ParseString\Float\StringToFloat;
use App\Services\ParseString\Int\StringToInt;
use App\Services\ParseString\MakeName\StringToMakeName;
use App\Services\Pricer\Message\ParserMessage;

class FileRow
{
    public string $number;
    public string $originNumber;
    public string $brand;
    public string $name;
    public int $quantity;
    public int $quantityLot;
    public float $price;

    public function __construct(
        private readonly array $row,
        private readonly ParserMessage $setting
    ) {
        $this->prepare();
    }

    private function prepare(): void
    {
        $this->number = (new StringToDetailNum($this->getByPos($this->setting->getColNumber())))->get();
        $this->brand = (new StringToMakeName($this->getByPos($this->setting->getColBrand())))->get();
        $this->name = (new StringToDetailName($this->getByPos($this->setting->getColName())))->get();
        $this->quantity = (new StringToInt($this->getByPos($this->setting->getColQty())))->get();
        $this->quantityLot = $this->prepareQuantityLot();
        $this->price = $this->preparePrice();
        $this->originNumber = (new StringToDetailName($this->getByPos($this->setting->getColNumber())))->get();
    }

    private function prepareQuantityLot(): int
    {
        if ($this->setting->getColMinPart() > 0) {
            return (new StringToInt($this->getByPos($this->setting->getColMinPart())))->get();
        }

        return 1;
    }

    private function preparePrice(): float
    {
        $price = (new StringToFloat($this->getByPos($this->setting->getColPrice())))->get();
        if ($this->setting->getCoef() > 0) {
            $price *= $this->setting->getCoef();
        }

        return $price;
    }

    public function checkPriceDelimiter(): bool
    {
        $str = $this->trim($this->setting->getColPrice());

        return ((int)$str > 0) && str_contains($str, '.') && str_contains($str, ',');
    }

    private function getByPos(?int $pos)
    {
        return $this->row[($pos ?? 1) - 1]??'';
    }
}
