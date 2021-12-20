<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Tests\Models;

use PHPUnit\Framework\TestCase;
use BrokeYourBike\UnitedBank\Models\TransactionStatusResponse;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class TransactionStatusResponseTest extends TestCase
{
    /** @test */
    public function it_extends_json_response()
    {
        $parent = get_parent_class(TransactionStatusResponse::class);

        $this->assertSame(\BrokeYourBike\DataTransferObject\JsonResponse::class, $parent);
    }
}
