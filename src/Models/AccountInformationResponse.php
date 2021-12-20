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
class AccountInformationResponse extends JsonResponse
{
    #[MapFrom('UBATransactionId')]
    public string $requestId;

    #[MapFrom('accountInformation.responseCode')]
    public string $responseCode;

    #[MapFrom('accountInformation.responseMessage')]
    public string $responseMessage;

    #[MapFrom('accountInformation.balanceCurrency')]
    public string $balanceCurrency;

    #[MapFrom('accountInformation.accountName')]
    public ?string $accountName;
}
