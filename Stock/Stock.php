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

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/withdraw', [
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
     * @param string $email
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
    public static function createPayment(string $email, string $currency, float $amount, string $bearer)
    {
        $client = new NativeHttpClient();

        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/create-payment', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'currency' => $currency,
                'amount' => $amount,
                'email' => $email
            ]
        ]);
        return $response->toArray();
    }

//    /**
//     * @param string $txn
//     * @param string $bearer
//     * @return array
//     * @throws ClientExceptionInterface
//     * @throws DecodingExceptionInterface
//     * @throws RedirectionExceptionInterface
//     * @throws ServerExceptionInterface
//     * @throws TransportExceptionInterface
//     */
//    public
//    static function checkDepositStatus(string $txn, string $bearer)
//    {
//        $client = new NativeHttpClient();
//
//        $response = $client->request('POST', 'http://cm.crpt.trading/exchange/deposit-status', [
//            'headers' => [
//                'Content-Type' => 'application/json',
//                'Authorization' => 'Bearer ' . $bearer
//            ],
//            'json' => [
//                'txn' => $txn,
//            ]
//        ]);
//        return $response->toArray();
//    }

    /**
     * @param int $id
     * @param string $currency
     * @param string $bearer
     * @return array
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public
    static function getWithdrawStatus(int $id, string $currency, string $bearer)
    {
        $client = new NativeHttpClient();

        $res = $client->request('POST', 'http://cm.crpt.trading/exchange/withdraw-status', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $bearer
            ],
            'json' => [
                'id' => $id,
                'currency' => $currency
            ]
        ]);
        return $res->toArray();
    }
}