<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Enums;

/**
 * @method static StatusCodeEnum SUCCESS()
 * @method static StatusCodeEnum FAILURE()
 * @method static StatusCodeEnum UNKNOWN()
 * @psalm-immutable
 */
final class StatusCodeEnum extends \MyCLabs\Enum\Enum
{
    /**
     * Transaction transfer successful
     */
    private const SUCCESS = 'Success';

    /**
     * Transaction failed
     */
    private const FAILURE = 'Failure';

    /**
     * Transaction state should be confirmed
     */
    private const UNKNOWN = 'Unknown';
}
