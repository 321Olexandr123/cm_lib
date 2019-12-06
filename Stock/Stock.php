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
     */
    public function course()
    {

    }

    /**
     * @return array
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function withdraw()
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.com/exchange/withdraw', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => $credential['Authorization'],
                'Token' => $credential['Token']
            ],
            'json' => [
                'stock' => 'huobi',
                'address' => '0xf2daaf10931f51969ef0d580d59ee95b2a49e3dd',
                'amount' => 3,
                'currency' => 'usdt'
            ]
        ]);
        return $response->toArray();
    }
}