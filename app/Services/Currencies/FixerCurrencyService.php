<?php


namespace App\Services\Currencies;


use App\Services\Currencies\Contracts\Currency;
use App\Services\Currencies\Contracts\CurrencyContract;
use App\Services\Currencies\Contracts\CurrencyException;
use Illuminate\Support\Facades\Cache;

class FixerCurrencyService implements CurrencyContract
{
    protected $cacheTime = 120;

    public function __construct()
    {
    }

    public function Return_key(){
        return config("currency.fixer.api_key");
    }

    public function Return_url(){
        return config("currency.fixer.base_url");
    }



    public function callApi($endpoint, $params = [])
    {
        $base_url = $this->Return_url();
        $access_key = $this->Return_key();

        // Initialize CURL:
        $ch = curl_init($base_url . $endpoint . '?access_key=' . $access_key . '');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response:
        return json_decode($json, true);

    }

    /**
     * @inheritDoc
     */
    public function convert($from, string $to, float $sum)
    {
        $responce = $this->callApi('latest')['rates'][$to];
        $responce2 = $this->callApi('latest')['rates'][$from];
        return $sum * $responce / $responce2;
    }

    /**
     * @inheritDoc
     */
    public function list(): array
    {
        $res = Cache::get("fixer_symbols");
        if (!$res){
            $data = $this->callApi('symbols');
            $res =  $data['symbols'];
            Cache::set("fixer_symbols", $res , $this->cacheTime);
        }

        return $res;
    }
}
