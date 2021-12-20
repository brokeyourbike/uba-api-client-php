<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Tests;

use BrokeYourBike\HasSourceModel\SourceModelInterface;
use BrokeYourBike\UnitedBank\Interfaces\TransactionInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
abstract class SourceTransactionFixture implements TransactionInterface, SourceModelInterface
{}
