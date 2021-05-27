<?php
declare(strict_types=1);

namespace Fgmarins\Fpay\Services\FpayService;

/**
 * Class Api
 * @package Fgmarins\Fpay\Services\FpayService
 */
class Api
{
    /**
     * @var string
     */
    private $clientCode;
    /**
     * @var string
     */
    private $clientKey;
    /**
     * @var string
     */
    private $url;

    /**
     * Api constructor.
     */
    public function __construct()
    {
        $this->url = "https://api-sandbox.fpay.me/vendas";
    }

    /**
     * @param string $clientCode
     * @return void
     */
    public function setClientCode(string $clientCode): void
    {
        $this->clientCode = $clientCode;
    }

    /**
     * @param string $clientKey
     * @return void
     */
    public function setClientKey(string $clientKey): void
    {
        $this->clientKey = $clientKey;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function getSale(array $params)
    {
        $request_headers = [
            "Client-Code: " . $this->clientCode,
            "Client-Key: " . $this->clientKey,
        ];

        $this->url .= '?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    /**
     * @param array $data
     * @return array
     */
    public function getNameAndDocument(array $data): array
    {
        $result = [];
        foreach ($data["data"] as $sale) {
            $result[] = [
                "nome"      => $sale["nm_cliente"] ?? null,
                "documento" => $sale["nu_documento"] ?? null,
            ];
        }

        return $result;
    }

    /**
     * @param array $data
     * @return array
     */
    public function getAllInstallments(array $data): array
    {
        $result = [];
        foreach ($data["data"] as $sale) {
            $result[$sale["nu_venda"]][] = $sale["parcelas"] ?? [];
        }

        return $result;
    }
}
