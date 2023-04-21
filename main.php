<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = new App\ApiClient();

$CryptoCurrencyInfo = $client->getInfo();