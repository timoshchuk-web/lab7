<?php


namespace App\Http\Controllers;


use App\Http\Requests\ConvertRequest;
use App\Services\Currencies\Contracts\CurrencyContract;

class  ConverterController extends Controller
{
    /**
     * @var CurrencyContract
     */
    protected $currencyService;

    public function __construct(CurrencyContract $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function index()
    {
        return view("converter.index", [
            "currencies" => $this->currencyService->list(),
        ]);
    }


    public function convert(ConvertRequest $request)
    {
        try {
            $result = $this->currencyService->convert($request->currency_from, $request->currency_to, $request->sum);
            $response = redirect(route("converter.index"));
            $request->session()->flash("Converted", $result);
        } catch (\Exception $exception) {
//            $response = redirect(route("converter.index"));
            // $response = ...
        }

        return  $response;
    }

}
