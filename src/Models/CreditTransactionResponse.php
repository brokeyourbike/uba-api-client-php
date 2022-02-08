<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Models;

use Spatie\DataTransferObject\Attributes\MapFrom;
use BrokeYourBike\DataTransferObject\JsonResponse;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class CreditTransactionResponse extends JsonResponse
{
    #[MapFrom('ErrorCode')]
    public ?string $errorCode;

    #[MapFrom('ErrorDescription')]
    public ?string $errorDescription;

    #[MapFrom('UBATransactionId')]
    public ?string $requestId;

    #[MapFrom('transactionId')]
    public ?string $transactionId;

    #[MapFrom('hsTransactionId')]
    public ?string $reference;

    #[MapFrom('provisionalResponse.state')]
    public ?string $state;

    #[MapFrom('provisionalResponse.label')]
    public ?string $stateLabel;
}
