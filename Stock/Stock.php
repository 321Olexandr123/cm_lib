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

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/generate-cryptocurrency', [
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

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/active-cryptocurrency', [
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
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function withdraw(string $address, int $amount, string $currency, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/withdraw', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'address' => $address,
                'amount' => $amount,
                'currency' => $currency
            ]
        ]);
        return $response->toArray();
    }

    /**
     * @param string $currency
     * @param float $amount
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function createPayment(string $currency, float $amount, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/create-payment', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'currency' => $currency,
                'amount' => $amount
            ]
        ]);
        return $response->toArray();
    }

    /**
     * @param string $token
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function checkDepositStatus(string $token, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/deposit-status', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'token' => $token,
            ]
        ]);
        return $response->toArray();
    }
}