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
enum ChannelTypeEnum: string
{
    /**
     * Bank Teller
     */
    case BANK_TELLER = '01';

    /**
     * Internet Banking
     */
    case INTERNET_BANKING = '02';

    /**
     * Mobile Phones
     */
    case MOBILE_PHONE = '03';

    /**
     * POS Terminals
     */
    case POS_TERMINAL = '04';

    /**
     * ATM
     */
    case ATM = '05';

    /**
     * Vendor/Merchant Web Portal
     */
    case MERCANT_WEB = '06';

    /**
     * Third Party Payment Platform
     */
    case THIRD_PARTY = '07';

    /**
     * Other Channels
     */
    case OTHER = '08';
}
