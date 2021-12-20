# uba-api-client

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/uba-api-client-php)](https://github.com/brokeyourbike/uba-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/uba-api-client/downloads)](https://packagist.org/packages/brokeyourbike/uba-api-client)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/uba-api-client-php/blob/main/LICENSE)

[![Maintainability](https://api.codeclimate.com/v1/badges/d38ab570bbbdbe2ac34e/maintainability)](https://codeclimate.com/github/brokeyourbike/uba-api-client-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/d38ab570bbbdbe2ac34e/test_coverage)](https://codeclimate.com/github/brokeyourbike/uba-api-client-php/test_coverage)
[![tests](https://github.com/brokeyourbike/uba-api-client-php/actions/workflows/tests.yml/badge.svg)](https://github.com/brokeyourbike/uba-api-client-php/actions/workflows/tests.yml)

First City Monument Bank API Client for PHP

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

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/uba-api-client-php/blob/main/LICENSE)
