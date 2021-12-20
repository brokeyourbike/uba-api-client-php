<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Enums;

/**
 * @method static ChannelTypeEnum BANK_TELLER()
 * @method static ChannelTypeEnum INTERNET_BANKING()
 * @method static ChannelTypeEnum MOBILE_PHONE()
 * @method static ChannelTypeEnum POS_TERMINAL()
 * @method static ChannelTypeEnum ATM()
 * @method static ChannelTypeEnum MERCANT_WEB()
 * @method static ChannelTypeEnum THIRD_PARTY()
 * @method static ChannelTypeEnum OTHER()
 * @psalm-immutable
 */
final class ChannelTypeEnum extends \MyCLabs\Enum\Enum
{
    /**
     * Bank Teller
     */
    private const BANK_TELLER = '01';

    /**
     * Internet Banking
     */
    private const INTERNET_BANKING = '02';

    /**
     * Mobile Phones
     */
    private const MOBILE_PHONE = '03';

    /**
     * POS Terminals
     */
    private const POS_TERMINAL = '04';

    /**
     * ATM
     */
    private const ATM = '05';

    /**
     * Vendor/Merchant Web Portal
     */
    private const MERCANT_WEB = '06';

    /**
     * Third Party Payment Platform
     */
    private const THIRD_PARTY = '07';

    /**
     * Other Channels
     */
    private const OTHER = '08';
}
