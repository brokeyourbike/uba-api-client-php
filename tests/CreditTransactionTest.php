<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Tests;

use Psr\Http\Message\ResponseInterface;
use BrokeYourBike\UnitedBank\Models\CreditTransactionResponse;
use BrokeYourBike\UnitedBank\Interfaces\TransactionInterface;
use BrokeYourBike\UnitedBank\Interfaces\ConfigInterface;
use BrokeYourBike\UnitedBank\Client;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class CreditTransactionTest extends TestCase
{
    private string $authToken = 'super-secure-token';
    private string $clientId = '123445';
    private string $clientName = 'acme corp.';
    private string $username = 'john';
    private string $password = 'password';

    /** @test */
    public function it_can_prepare_request(): void
    {
        $transaction = $this->getMockBuilder(TransactionInterface::class)->getMock();
        $transaction->method('getDestinationId')->willReturn('TRX1234');
        $transaction->method('getReference')->willReturn('REF-5554');
        $transaction->method('getSourceSwiftCode')->willReturn('source-1234');
        $transaction->method('getDestinationAccountNumber')->willReturn('001234');
        $transaction->method('getDestinationSwiftCode')->willReturn('dest-1234');
        $transaction->method('getRoutingTag')->willReturn('route-66');
        $transaction->method('getSenderName')->willReturn('John Doe');
        $transaction->method('getCurrencyCode')->willReturn('NGN');
        $transaction->method('getAmount')->willReturn(10.0);

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
                "transactionId": "NGKPYI210203124016234",
                "hsTransactionId": "TPTEST190313021",
                "UBATransactionId": "NGKPYI210203124534298",
                "vendorSpecificFields": {
                    "ClientId": "1110",
                    "fieldId": "3001",
                    "value": "HomeSend"
                },
                "provisionalResponse": {
                    "maxCompletionDate": "2021-02-03T12:45:36Z",
                    "state": "000",
                    "label": "Funds Transfer successful"
                }
            }');

        /** @var \Mockery\MockInterface $mockedClient */
        $mockedClient = \Mockery::mock(\GuzzleHttp\Client::class);
        $mockedClient->shouldReceive('request')->withArgs([
            'POST',
            'https://api.example/credit/v1.0',
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
                    'transactionId' => 'TRX1234',
                    'hstransactionId' => 'REF-5554',
                    'Stan' => 'REF-5554',
                    'sourceUri' => "bic=source-1234",
                    'destinationUri' => "ban:001234;bic=dest-1234",
                    'amountInformation' => [
                        'currency' => 'NGN',
                        'amount' => (string) 10.0,
                    ],
                    'senderInformation' => [
                        'Name' => 'John Doe',
                    ],
                    'routingTag' => 'route-66',
                    'description' => '',
                    'vendorSpecificFields' => [
                        'ClientId' => $this->clientId,
                        'ClientName' => $this->clientName,
                        'BenefName' => '',
                    ],
                ],
            ],
        ])->once()->andReturn($mockedResponse);

        /**
         * @var ConfigInterface $mockedConfig
         * @var \GuzzleHttp\Client $mockedClient
         * */
        $api = new Client($mockedConfig, $mockedClient);

        $requestResult = $api->creditTransaction($transaction);

        $this->assertInstanceOf(CreditTransactionResponse::class, $requestResult);
    }
}
