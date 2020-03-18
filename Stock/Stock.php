<?php

namespace Stock\Stock;

use Symfony\Component\HttpClient\NativeHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class Stock
 * @package Stock\Stock
 */
class Stock
{
    /**
     *
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function generateCryptocurrency(string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'https://cm.crpt.trading/exchange/generate-cryptocurrency', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ]
        ]);
        return $response->toArray();
    }

    /**
     *
     * @param array $cryptocurrency
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function updateActiveCryptocurrency(array $cryptocurrency, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'https://cm.crpt.trading/exchange/active-cryptocurrency', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'cryptocurrency' => $cryptocurrency
            ]
        ]);
        return $response->toArray();
    }

    /**
     * @param string $address
     * @param int $amount
     * @param string $currency
     * @param float $constant
     * @param string $callBackUrl
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function withdraw(string $address, int $amount, string $currency, float $constant, string $callBackUrl, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'https://cm.crpt.trading/exchange/withdraw', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'address' => $address,
                'amount' => $amount,
                'currency' => $currency,
                'constant' => $constant,
                'url' => $callBackUrl
            ]
        ]);
        return $response->toArray();
    }

    /**
     * @param int $id
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public
    static function getWithdrawStatus(int $id, string $bearer)
    {
        $client = new NativeHttpClient();

        $res = $client->request('POST', 'https://cm.crpt.trading/exchange/withdraw-status', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'id' => $id
            ]
        ]);
        return $res->toArray();
    }

    /**
     * @param string $abbreviation
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public
    static function createDepositAddress(string $abbreviation, string $bearer)
    {
        $client = new NativeHttpClient();

        $res = $client->request('POST', 'https://cm.crpt.trading/payment/create-address', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'asset' => $abbreviation
            ]
        ]);
        return $res->toArray();
    }

    /**
     * @param string $paymentId
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public
    static function getDepositStatus(string $paymentId, string $bearer)
    {
        $client = new NativeHttpClient();

        $res = $client->request('POST', 'https://cm.crpt.trading/payment/check-transactions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'id' => $paymentId
            ]
        ]);
        return $res->toArray();
    }
}