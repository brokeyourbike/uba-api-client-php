<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Interfaces;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
interface TransactionInterface
{
    public function getReference(): string;
    public function getCurrencyCode(): string;
    public function getAmount(): float;
    public function getSenderName(): string;
    public function getRecipientName(): ?string;
    public function getSourceSwiftCode(): string;
    public function getDestinationId(): string;
    public function getDestinationAccountNumber(): string;
    public function getDestinationSwiftCode(): string;
    public function getRoutingTag(): string;
    public function getDescription(): ?string;
}
