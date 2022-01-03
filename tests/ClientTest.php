<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Tests;

use PHPUnit\Framework\TestCase;
use BrokeYourBike\UnitedBank\Interfaces\ConfigInterface;
use BrokeYourBike\UnitedBank\Client;
use BrokeYourBike\ResolveUri\ResolveUriTrait;
use BrokeYourBike\HttpClient\HttpClientTrait;
use BrokeYourBike\HttpClient\HttpClientInterface;
use BrokeYourBike\HasSourceModel\HasSourceModelTrait;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class ClientTest extends TestCase
{
    /** @test */
    public function it_implemets_http_client_interface(): void
    {
        /** @var ConfigInterface */
        $mockedConfig = $this->getMockBuilder(ConfigInterface::class)->getMock();

        /** @var \GuzzleHttp\ClientInterface */
        $mockedHttpClient = $this->getMockBuilder(\GuzzleHttp\ClientInterface::class)->getMock();

        $api = new Client($mockedConfig, $mockedHttpClient);

        $this->assertInstanceOf(HttpClientInterface::class, $api);
        $this->assertSame($mockedConfig, $api->getConfig());
    }

    /** @test */
    public function it_uses_http_client_trait(): void
    {
        $usedTraits = class_uses(Client::class);

        $this->assertArrayHasKey(HttpClientTrait::class, $usedTraits);
    }

    /** @test */
    public function it_uses_resolve_uri_trait(): void
    {
        $usedTraits = class_uses(Client::class);

        $this->assertArrayHasKey(ResolveUriTrait::class, $usedTraits);
    }

    /** @test */
    public function it_uses_has_source_model_trait(): void
    {
        $usedTraits = class_uses(Client::class);

        $this->assertArrayHasKey(HasSourceModelTrait::class, $usedTraits);
    }
}
