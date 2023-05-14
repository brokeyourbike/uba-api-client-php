# uba-api-client

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/uba-api-client-php)](https://github.com/brokeyourbike/uba-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/uba-api-client/downloads)](https://packagist.org/packages/brokeyourbike/uba-api-client)
[![Maintainability](https://api.codeclimate.com/v1/badges/a64835e6f2c49e1da492/maintainability)](https://codeclimate.com/github/brokeyourbike/uba-api-client-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/a64835e6f2c49e1da492/test_coverage)](https://codeclimate.com/github/brokeyourbike/uba-api-client-php/test_coverage)

United Bank for Africa API Client for PHP

## Installation

```bash
composer require brokeyourbike/uba-api-client
```

## Usage

```php
use BrokeYourBike\UnitedBank\Client;

$apiClient = new Client($config, $httpClient, $psrCache);
$apiClient->fetchAuthTokenRaw();
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/uba-api-client-php/blob/main/LICENSE)
