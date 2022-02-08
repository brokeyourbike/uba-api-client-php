<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Tests;

use Psr\Http\Message\ResponseInterface;
use BrokeYourBike\UnitedBank\Models\TransactionStatusResponse;
use BrokeYourBike\UnitedBank\Interfaces\TransactionInterface;
use BrokeYourBike\UnitedBank\Interfaces\ConfigInterface;
use BrokeYourBike\UnitedBank\Client;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class FetchTransactionStatusTest extends TestCase
{
    private string $authToken = 'super-secure-token';
    private string $clientId = '123445';
    private string $clientName = 'acme corp.';
    private string $username = 'john';
    private string $password = 'password';

    private string $destinationId = 'dest-123';

    /** @test */
    public function it_can_prepare_request(): void
    {
        $transaction = $this->getMockBuilder(TransactionInterface::class)->getMock();
        $transaction->method('getDestinationId')->willReturn($this->destinationId);

        /** @var TransactionInterface $transaction */
        $this->assertInstanceOf(TransactionInterface::class, $transaction);

        $mockedConfig = $this->getMockBuilder(ConfigInterface::class)->getMock();
        $mockedConfig->method('getUrl')->willReturn('https://api.example/');
        $mockedConfig->method('getToken')->willReturn($this->authToken);
        $mockedConfig->method('getClientId')->willReturn($this->clientId);
        $mockedConfig->method('getClientName')->willReturn($this->clientName);
        $mockedConfig->method('getUsername')->willReturn($this->username);
        $mockedConfig->method('getPassword')->willReturn($this->password);

        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')
            ->willReturn('{
                "status": {
                    "transactionId": "'. $this->destinationId .'",
                    "hsTransactionId": "234123412341",
                    "state": "Success",
                    "stateLabel": "SUCCESS",
                    "statusCode": "000"
                }
            }');

        /** @var \Mockery\MockInterface $mockedClient */
        $mockedClient = \Mockery::mock(\GuzzleHttp\Client::class);
        $mockedClient->shouldReceive('request')->withArgs([
            'POST',
            'https://api.example/Status/v1.0',
            [
                \GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer {$this->authToken}",
                ],
                \GuzzleHttp\RequestOptions::JSON => [
                    'Security' => [
                        'login' => $this->username,
                        'Password' => $this->password,
                    ],
                    'transactionId' => $this->destinationId,
                    'vendorSpecificFields' => [
                        'ClientId' => $this->clientId,
                        'ClientName' => $this->clientName,
                    ],
                ],
            ],
        ])->once()->andReturn($mockedResponse);

        /**
         * @var ConfigInterface $mockedConfig
         * @var \GuzzleHttp\Client $mockedClient
         * */
        $api = new Client($mockedConfig, $mockedClient);

        $requestResult = $api->fetchTransactionStatus($transaction);

        $this->assertInstanceOf(TransactionStatusResponse::class, $requestResult);
    }

    /** @test */
    public function it_can_handle_error_response()
    {
        $transaction = $this->getMockBuilder(TransactionInterface::class)->getMock();
        $transaction->method('getDestinationId')->willReturn($this->destinationId);

        /** @var TransactionInterface $transaction */
        $this->assertInstanceOf(TransactionInterface::class, $transaction);

        $mockedConfig = $this->getMockBuilder(ConfigInterface::class)->getMock();
        $mockedConfig->method('getUrl')->willReturn('https://api.example/');
        $mockedConfig->method('getToken')->willReturn($this->authToken);
        $mockedConfig->method('getClientId')->willReturn($this->clientId);
        $mockedConfig->method('getClientName')->willReturn($this->clientName);
        $mockedConfig->method('getUsername')->willReturn($this->username);
        $mockedConfig->method('getPassword')->willReturn($this->password);

        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')
            ->willReturn('{
                "ErrorCode": "999",
                "ErrorDescription": "Invalid Credentials"
            }');

        /** @var \Mockery\MockInterface $mockedClient */
        $mockedClient = \Mockery::mock(\GuzzleHttp\Client::class);
        $mockedClient->shouldReceive('request')->withArgs([
            'POST',
            'https://api.example/Status/v1.0',
            [
                \GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer {$this->authToken}",
                ],
                \GuzzleHttp\RequestOptions::JSON => [
                    'Security' => [
                        'login' => $this->username,
                        'Password' => $this->password,
                    ],
                    'transactionId' => $this->destinationId,
                    'vendorSpecificFields' => [
                        'ClientId' => $this->clientId,
                        'ClientName' => $this->clientName,
                    ],
                ],
            ],
        ])->once()->andReturn($mockedResponse);

        /**
         * @var ConfigInterface $mockedConfig
         * @var \GuzzleHttp\Client $mockedClient
         * */
        $api = new Client($mockedConfig, $mockedClient);

        $requestResult = $api->fetchTransactionStatus($transaction);

        $this->assertInstanceOf(TransactionStatusResponse::class, $requestResult);
        $this->assertSame('999', $requestResult->errorCode);
        $this->assertSame('Invalid Credentials', $requestResult->errorDescription);
    }
}
