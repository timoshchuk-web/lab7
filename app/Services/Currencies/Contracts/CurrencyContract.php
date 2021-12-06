<?php


namespace App\Services\Currencies\Contracts;


use phpDocumentor\Reflection\DocBlock;

interface CurrencyContract
{
    /**
     * Convert currency
     * @param string $from
     * @param string $to
     * @param double $sum
     * @return float
     * @throws CurrencyException
     */
    public function convert(string $from,  string $to, float $sum);

    /**
     * Get available currency list
     * @return Currency[]
     */
    public function list(): array;

}
