<?php


namespace App\Services\Currencies;


use App\Services\Currencies\Contracts\Currency;
use App\Services\Currencies\Contracts\CurrencyContract;
use App\Services\Currencies\Contracts\CurrencyException;

class CbRfCurrencyService implements CurrencyContract
{
    public function callApi()
    {
        static $rates;

        if ($rates === null) {
            $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
        }

        return $rates;
    }


    public function convert(string $from, string $to, float $sum)
    {
        $responce = $this->callApi()->Valute->$to->Value;
        $responce2 = $this->callApi()->Valute->$from->Value;
        return $sum / $responce * $responce2;
    }

    public function list(): array
    {
        $data = $this->callApi()->Valute;
        $array = [];

        foreach (get_object_vars($data) as $key => $arr) {
            $array[$arr->CharCode] = $arr->Name;
        }

        return $array;

    }
}
