<?php
declare(strict_types=1);

namespace Fgmarins\Fpay\Tests\Unit\Services\FpayService;

use Fgmarins\Fpay\Services\FpayService\Api;
use PHPUnit\Framework\TestCase;

/**
 * Class ApiTest
 * @package Fgmarins\Fpay\Tests\Unit\Services\FpayService
 */
class ApiTest extends TestCase
{
    /**
     * @var Api
     */
    private $classInstance;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->classInstance = new Api();
    }

    /**
     * @test
     * @return void
     */
    public function testSetClientCode(): void
    {
        $result = $this->classInstance->setClientCode('x');
        $this->assertNull($result);
    }

    /**
     * @test
     * @return void
     */
    public function testSetClientKey(): void
    {
        $result = $this->classInstance->setClientKey('x');
        $this->assertNull($result);
    }

    /**
     * @test
     * @return void
     */
    public function testGetSale(): void
    {
        $paramsMock = [];

        $result = $this->classInstance->getSale($paramsMock);
        $this->assertTrue(is_array($result));
    }

    /**
     * @test
     * @return void
     */
    public function testGetNameAndDocument(): void
    {
        $paramsMock = [
            "data" => [
                "nm_cliente"   => 1,
                "nu_documento" => 1,
            ],
        ];

        $result = $this->classInstance->getNameAndDocument($paramsMock);
        $this->assertTrue(is_array($result));
    }

    /**
     * @test
     * @return void
     */
    public function testGetAllInstallments(): void
    {
        $paramsMock = [
            "data" => [
                [
                    "nu_venda" => 1,
                    "parcelas" => [],
                ],
            ],
        ];

        $result = $this->classInstance->getAllInstallments($paramsMock);
        $this->assertTrue(is_array($result));
    }
}
