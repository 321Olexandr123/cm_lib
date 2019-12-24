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
    public static function generatePair(string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/generate-pair', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ]
        ]);
        return $response->toArray();
    }

    /**
     *
     * @param string $bearer
     * @param array $pair
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public static function course(string $bearer, array $pair)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/course', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'pair' => $pair
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

        $response = $client->request('POST', 'http://cm.com/exchange/withdraw', [
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
    public static function payment(string $currency, float $amount, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/payment', [
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
}