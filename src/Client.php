<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\ClientInterface;
use BrokeYourBike\UnitedBank\Models\TransactionStatusResponse;
use BrokeYourBike\UnitedBank\Models\CreditTransactionResponse;
use BrokeYourBike\UnitedBank\Models\AccountInformationResponse;
use BrokeYourBike\UnitedBank\Interfaces\TransactionInterface;
use BrokeYourBike\UnitedBank\Interfaces\ConfigInterface;
use BrokeYourBike\ResolveUri\ResolveUriTrait;
use BrokeYourBike\HttpEnums\HttpMethodEnum;
use BrokeYourBike\HttpClient\HttpClientTrait;
use BrokeYourBike\HttpClient\HttpClientInterface;
use BrokeYourBike\HasSourceModel\SourceModelInterface;
use BrokeYourBike\HasSourceModel\HasSourceModelTrait;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class Client implements HttpClientInterface
{
    use HttpClientTrait;
    use ResolveUriTrait;
    use HasSourceModelTrait;

    private ConfigInterface $config;

    public function __construct(ConfigInterface $config, ClientInterface $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    public function fetchAccountInformationForTransaction(TransactionInterface $transaction): AccountInformationResponse
    {
        if ($transaction instanceof SourceModelInterface) {
            $this->setSourceModel($transaction);
        }

        $response = $this->performRequest(HttpMethodEnum::POST(), 'accountinformation/v1.0', [
            'Security' => [
                'login' => $this->config->getUsername(),
                'Password' => $this->config->getPassword(),
            ],
            'sourceUri' => "bic={$transaction->getSourceSwiftCode()}",
            'destinationUri' => "ban:{$transaction->getDestinationAccountNumber()};bic={$transaction->getDestinationSwiftCode()}",
            'routingTag' => $transaction->getRoutingTag(),
            'vendorSpecificFields' => [
                'ClientId' => $this->config->getClientId(),
                'ClientName' => $this->config->getClientName(),
            ],
        ]);
        return new AccountInformationResponse($response);
    }

    public function fetchTransactionStatus(TransactionInterface $transaction): TransactionStatusResponse
    {
        if ($transaction instanceof SourceModelInterface) {
            $this->setSourceModel($transaction);
        }

        $response = $this->performRequest(HttpMethodEnum::POST(), 'Status/v1.0', [
            'Security' => [
                'login' => $this->config->getUsername(),
                'Password' => $this->config->getPassword(),
            ],
            'transactionId' => $transaction->getDestinationId(),
            'vendorSpecificFields' => [
                'ClientId' => $this->config->getClientId(),
                'ClientName' => $this->config->getClientName(),
            ],
        ]);
        return new TransactionStatusResponse($response);
    }

    public function creditTransaction(TransactionInterface $transaction): CreditTransactionResponse
    {
        if ($transaction instanceof SourceModelInterface) {
            $this->setSourceModel($transaction);
        }

        $response = $this->performRequest(HttpMethodEnum::POST(), 'credit/v1.0', [
            'Security' => [
                'login' => $this->config->getUsername(),
                'Password' => $this->config->getPassword(),
            ],
            'transactionId' => $transaction->getDestinationId(),
            'hstransactionId' => $transaction->getReference(),
            'Stan' => $transaction->getReference(),
            'sourceUri' => "bic={$transaction->getSourceSwiftCode()}",
            'destinationUri' => "ban:{$transaction->getDestinationAccountNumber()};bic={$transaction->getDestinationSwiftCode()}",
            'amountInformation' => [
                'currency' => $transaction->getCurrencyCode(),
                'amount' => (string) $transaction->getAmount(),
            ],
            'senderInformation' => [
                'Name' => $transaction->getSenderName(),
            ],
            'routingTag' => $transaction->getRoutingTag(),
            'description' => $transaction->getDescription() ?? '',
            'vendorSpecificFields' => [
                'ClientId' => $this->config->getClientId(),
                'ClientName' => $this->config->getClientName(),
                'BenefName' => $transaction->getRecipientName() ?? '',
            ],
        ]);
        return new CreditTransactionResponse($response);
    }

    /**
     * @param HttpMethodEnum $method
     * @param string $uri
     * @param array<mixed> $data
     * @return ResponseInterface
     */
    private function performRequest(HttpMethodEnum $method, string $uri, array $data): ResponseInterface
    {
        $options = [
            \GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
            \GuzzleHttp\RequestOptions::HEADERS => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$this->config->getToken()}",
            ],
            \GuzzleHttp\RequestOptions::JSON => $data,
        ];

        if ($this->getSourceModel()) {
            $options[\BrokeYourBike\HasSourceModel\Enums\RequestOptions::SOURCE_MODEL] = $this->getSourceModel();
        }

        $uri = (string) $this->resolveUriFor($this->config->getUrl(), $uri);
        return $this->httpClient->request((string) $method, $uri, $options);
    }
}
