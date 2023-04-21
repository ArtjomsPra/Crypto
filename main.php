<?php declare(strict_types=1);

require_once 'vendor/autoload.php';

$client = new App\ApiClient();
$cryptoCurrencies = $client->getInfo();

foreach ($cryptoCurrencies as $cryptoCurrency) {
    echo "Name: " . $cryptoCurrency->getName() . PHP_EOL;
    echo "Symbol: " . $cryptoCurrency->getSymbol() . PHP_EOL;
    echo "Price: $" . $cryptoCurrency->getPrice() . PHP_EOL;
}
