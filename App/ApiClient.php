<?php declare(strict_types=1);

namespace App;

use GuzzleHttp\Client;

class ApiClient {
    private $client;

    public function __construct()
    {
        $this->client = new Client(['verify' => false]);
    }

    public function getInfo(): array
    {
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?limit=10&convert=USD';
        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Accepts' => 'application/json',
                'X-CMC_PRO_API_KEY' => '***********'
            ]
        ]);
        $cryptoCurrencyData = json_decode($response->getBody()->getContents(), true)['data'];
        //var_dump($cryptoCurrencyData);
        $cryptoCurrencies = [];
        foreach ($cryptoCurrencyData as $currencyData) {
            $cryptoCurrencies[] = new CryptoCurrencyInfo($currencyData);
        }
        return $cryptoCurrencies;
    }
}
