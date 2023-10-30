<?php

declare(strict_types=1);

namespace App\Services\ParseString\DateTime;

use App\Services\ParseString\SingleInterface;
use DateTime;

class StringToDateTime implements SingleInterface
{
    private DateTime $clean;

    public function __construct(private readonly ?string $raw)
    {
        $this->parse();
    }

    private function parse(): void
    {
        $raw = mb_strtolower(trim($this->raw));
        $raw = str_replace([' ', 'г.', 'г', 'года'], ' ', $raw);
        $raw = str_replace([' января ', ' янв. ', ' янв '], '.01.', $raw);
        $raw = str_replace([' февраля ', ' фев. ', ' фев '], '.02.', $raw);
        $raw = str_replace([' марта ', ' мар. ', ' мар '], '.03.', $raw);
        $raw = str_replace([' апреля ', ' апр. ', ' апр '], '.04.', $raw);
        $raw = str_replace([' мая '], '.05.', $raw);
        $raw = str_replace([' июня ', ' июн. ', ' июн '], '.06.', $raw);
        $raw = str_replace([' июля ', ' июл. ', ' июл '], '.07.', $raw);
        $raw = str_replace([' августа ', ' авг. ', ' авг '], '.08.', $raw);
        $raw = str_replace([' сентября ', ' сен. ', ' сен '], '.09.', $raw);
        $raw = str_replace([' октября ', ' окт. ', ' окт '], '.10.', $raw);
        $raw = str_replace([' ноября ', ' ноя. ', ' ноя '], '.11.', $raw);
        $raw = str_replace([' декабря ', ' дек. ', ' дек '], '.12.', $raw);
        if (preg_match("/^(?:\d{1,2}\.){2}\d{2}$/", $raw, $matches)) {
            $part=explode('.',$matches[0]);
            $day = intval($part[0]);
            $month = intval($part[1]);
            $year = intval($part[2]);
            $raw = "$day.$month.20$year";
        }
        if (preg_match("/^(?:\d{1,2}-){2}\d{2}$/", $raw, $matches)) {
            $part=explode('-',$matches[0]);
            $day = intval($part[0]);
            $month = intval($part[1]);
            $year = intval($part[2]);
            $raw = "$day.$month.20$year";
        }
        $this->clean = new DateTime($raw);
    }

    public function get(): DateTime
    {
        return $this->clean;
    }
}
