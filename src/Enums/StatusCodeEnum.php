<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Enums;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
enum StatusCodeEnum: string
{
    /**
     * Transaction transfer successful
     */
    case SUCCESS = 'Success';

    /**
     * Transaction failed
     */
    case FAILURE = 'Failure';

    /**
     * Transaction state should be confirmed
     */
    case UNKNOWN = 'Unknown';
}
