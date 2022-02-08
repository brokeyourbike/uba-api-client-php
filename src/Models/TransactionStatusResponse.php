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
class TransactionStatusResponse extends JsonResponse
{
    #[MapFrom('ErrorCode')]
    public ?string $errorCode;

    #[MapFrom('ErrorDescription')]
    public ?string $errorDescription;

    #[MapFrom('status.state')]
    public ?string $state;

    #[MapFrom('status.stateLabel')]
    public ?string $stateLabel;

    #[MapFrom('status.statusCode')]
    public ?string $statusCode;

    #[MapFrom('status.transactionId')]
    public ?string $transactionId;

    #[MapFrom('status.hsTransactionId')]
    public ?string $reference;
}
