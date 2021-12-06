<?php

namespace Tests\Unit;

use App\Services\Currencies\Contracts\CurrencyContract;
use App\Services\Currencies\FixerCurrencyService;
use PHPUnit\Framework\TestCase;

class FixerServiceTest extends \Tests\TestCase
{
    /**
     * @var CurrencyContract
     */
    private $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->app->make(CurrencyContract::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testServiceInstance()
    {
        $this->assertInstanceOf(CurrencyContract::class, $this->service);
    }
    public function testList()
    {
        $res = $this->service->list();
        $this->assertTrue(true);
    }
}
