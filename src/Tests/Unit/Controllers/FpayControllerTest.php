<?php
declare(strict_types=1);

namespace Fgmarins\Fpay\Tests\Unit\Controllers;

use Tests\TestCase;

/**
 * Class FpayControllerTest
 * @package Fgmarins\Fpay\Tests\Unit\Controllers
 */
class FpayControllerTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function testGetSales(): void
    {
        $this->json('GET', 'api/v1/fpay/sales',
                    [
                        "nu_referencia" => "REF0001",
                        "nu_venda"      => "38425-uGet3-2KFMj",
                        "page"          => "0",
                        "per_page"      => "10",
                        "dt_venda"      => "2020-04-14",
                    ]
            , [])->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function testGetSalesThrowException(): void
    {
        $this->json('GET', 'api/v1/fpay/sales',
                    [
                        "page" => "a",
                    ]
            , [])->assertStatus(400);
    }

    /**
     * @test
     * @return void
     */
    public function testGetSalesNameAndDocument(): void
    {
        $this->json('GET', 'api/v1/fpay/namedocument',
                    [
                        "nu_referencia" => "REF0001",
                        "nu_venda"      => "38425-uGet3-2KFMj",
                        "page"          => "0",
                        "per_page"      => "10",
                        "dt_venda"      => "2020-04-14",
                    ]
            , [])->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function testGetSalesNameAndDocumentThrowException(): void
    {
        $this->json('GET', 'api/v1/fpay/namedocument',
                    [
                        "page" => "a",
                    ]
            , [])->assertStatus(400);
    }

    /**
     * @test
     * @return void
     */
    public function testGetAllSalesInstallments(): void
    {
        $this->json('GET', 'api/v1/fpay/installments',
                    [
                        "nu_referencia" => "REF0001",
                        "nu_venda"      => "38425-uGet3-2KFMj",
                        "page"          => "0",
                        "per_page"      => "10",
                        "dt_venda"      => "2020-04-14",
                    ]
            , [])->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function testGetAllSalesInstallmentsThrowException(): void
    {
        $this->json('GET', 'api/v1/fpay/installments',
                    [
                        "page" => "a",
                    ]
            , [])->assertStatus(400);
    }
}
