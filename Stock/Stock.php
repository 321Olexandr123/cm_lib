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
     * @param string $stock
     * @param string $authorization
     * @param string $token
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function course(string $stock, string $authorization, string $token)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/course', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $authorization,
                'Token' => $token
            ],
            'json' => [
                'stock' => $stock,
            ]
        ]);
        return $response->toArray();
    }

    /**
     * @param string $stock
     * @param string $address
     * @param int $amount
     * @param string $currency
     * @param string $authorization
     * @param string $token
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function withdraw(string $stock, string $address, int $amount, string $currency, string $authorization, string $token)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/withdraw', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $authorization,
                'Token' => $token
            ],
            'json' => [
                'stock' => $stock,
                'address' => $address,
                'amount' => $amount,
                'currency' => $currency
            ]
        ]);
        return $response->toArray();
    }
}