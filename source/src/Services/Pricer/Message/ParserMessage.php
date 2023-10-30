<?php

declare(strict_types=1);

namespace App\Services\Pricer\Message;

readonly class ParserMessage
{
    public function __construct(
        private string $fileName,
        private string $delimiter,
        private string $supplierCode = 'SUP',
        private string $directionName = 'DIR',
        private int $colNumber = 2, //Столбец с номером(артикулом)
        private int $colBrand = 1, //Столбец с брендом
        private int $colName = 5, //Столбец с наименованием
        private int $colQty = 3, //Столбец с количеством
        private int $colPrice = 4, //Столбец с ценой
        private int $coef = 1, //Коэффициент прайс-листа
        private int $colMinPart = 6, //Столбец с минимальной партией
        private int $percentDangerPriceLess = 80, //На сколько % должна снизиться цена, чтобы изменения блокировались.
    )
    {
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    public function getSupplierCode(): string
    {
        return $this->supplierCode;
    }

    public function getDirectionName(): string
    {
        return $this->directionName;
    }

    public function getColNumber(): int
    {
        return $this->colNumber;
    }

    public function getColBrand(): int
    {
        return $this->colBrand;
    }

    public function getColName(): int
    {
        return $this->colName;
    }

    public function getColQty(): int
    {
        return $this->colQty;
    }

    public function getColPrice(): int
    {
        return $this->colPrice;
    }

    public function getCoef(): int
    {
        return $this->coef;
    }

    public function getColMinPart(): int
    {
        return $this->colMinPart;
    }

    public function getPercentDangerPriceLess(): int
    {
        return $this->percentDangerPriceLess;
    }
}
