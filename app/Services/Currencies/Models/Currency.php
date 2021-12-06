<?php


namespace App\Services\Currencies\Models;


class Currency
{
    public $name;
    public $code;

    /**
     * Currency constructor.
     * @param $name
     * @param $code
     */
    public function __construct($name, $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }




}
