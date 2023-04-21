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
                'X-CMC_PRO_API_KEY' => '333febdf-4fef-4216-8a84-cfe9ed412462'
            ]
        ]);
        $cryptoCurrencyData = json_decode($response->getBody()->getContents(), true)['data'];
        $cryptoCurrencies = [];
        foreach ($cryptoCurrencyData as $currencyData) {
            $cryptoCurrencies[] = new CryptoCurrencyInfo($currencyData);
        }
        return $cryptoCurrencies;
    }
}
