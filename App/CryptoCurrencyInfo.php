<?php declare(strict_types=1);

namespace App;

class CryptoCurrencyInfo {
    private string $name;
    private string $symbol;
    private float $price;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->symbol = $data['symbol'];
        $this->price = $data['quote']['USD']['price'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}
