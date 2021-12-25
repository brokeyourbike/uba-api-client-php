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
enum ErrorCodeEnum: string
{
    /**
     * Successful request.
     */
    case SUCCESS = '000';

    /**
     * Invalid Scheme Type.
     */
    case INVALID_SCHEME_TYPE = '111';

    /**
     * Invalid Account Number.
     */
    case INVALID_ACCOUNT_NUMBER = '114';

    /**
     * Requested function not supported.
     */
    case UNSUPPORTED_REQUEST_FUNCTION = '115';

    /**
     * Insufficient funds.
     */
    case INSUFFICIENT_FUNDS = '116';

    /**
     * Transaction not permitted to card holder.
     */
    case TRANSACTION_NOT_PERMITTED = '119';

    /**
     * Withdrawal amount limit exceeded.
     */
    case WITHDRAWAL_AMOUNT_LIMIT_EXCEEDED = '121';

    /**
     * Format error(Sent by Web Service).
     */
    case FORMAT_ERROR = '133';

    /**
     * Data retrieval error.
     */
    case DATA_RETRIEVAL_ERROR = '134';

    /**
     * Country Code is missing.
     */
    case MISSING_COUNTRY_CODE = '135';

    /**
     * Invalid data type.
     */
    case INVALID_DATA_TYPE = '136';

    /**
     * Configuration error! Unable to retrieve bank details.
     */
    case BANK_CONFIG_ERROR = '137';

    /**
     * Configuration error! Unable to retrieve SOL details.
     */
    case SOL_CONFIG_ERROR = '138';

    /**
     * Unknown error. Check the service logs.
     */
    case UNKNOWN_ERROR = '139';

    /**
     * Security violation.
     */
    case SECURITY_VIOLATION_LEVEL_0 = '140';

    /**
     * Security violation.
     */
    case SECURITY_VIOLATION_LEVEL_1 = '141';

    /**
     * Invalid Cheque Status.
     */
    case INVALID_CHEQUE_STATUS = '163';

    /**
     * Transfer Limit Exceeded.
     */
    case TRANSFER_LIMIT_EXCEEDED = '180';

    /**
     * Transfer Limit Exceeded.
     */
    case CHEQUES_ARE_IN_DIFFERENT_BOOKS = '181';

    /**
     * Not all Cheques could be stopped.
     */
    case NOT_ALL_CHEQUES_COULD_BE_STOPPED = '182';

    /**
     * Cheque not issued to this account.
     */
    case CHEQUE_NOT_ISSUED_TO_ACCOUNT = '183';

    /**
     * Account closed.
     */
    case ACCOUNT_CLOSED = '184';

    /**
     * Invalid currency.
     */
    case INVALID_CURRENCY = '185';

    /**
     * Block does not exist.
     */
    case BLOCK_NOT_FOUND = '186';

    /**
     * Cheque stopped.
     */
    case CHEQUE_STOPPED = '187';

    /**
     * Invalid Rate Currency Combination.
     */
    case INVALID_RATE_CURRENCY_COMBINATION = '188';

    /**
     * Invalid Rate Currency Combination.
     */
    case CHEQUE_BOOK_ALREADY_ISSUED = '189';

    /**
     * DD Already Paid.
     */
    case DD_ALREADY_PAID = '190';

    /**
     * Network message was accepted.
     */
    case NETWORK_MESSAGE_WAS_ACCEPTED = '800';

    /**
     * Invalid transaction/ function code.
     */
    case INVALID_TRANSACTION_CODE = '902';

    /**
     * Cut-over in progress.
     * (When DC is generating PBF, it will give this result code).
     */
    case CUT_OVER_IN_PROGRESS = '906';

    /**
     * CBA Inoperative
     * (Confirm status before retrying/repeating the transaction)
     */
    case SERVICE_ERROR = '907';

    /**
     * Service timed out, status is unknown
     * (Confirm status before retrying/repeating the transaction)
     */
    case SERVICE_TIMEOUT = '911';

    /**
     * Duplicate STAN.
     */
    case DUPLICATE_STAN = '913';

    /**
     * Please provide valid JSON request.
     */
    case INVALID_REQUEST_JSON = '990';

    /**
     * Invalid TransactionID.
     */
    case INVALID_TRANSACTION_ID = '995';

    /**
     * Source and Destination countries are different.
     */
    case COUNTRIES_MISSMATCH = '998';

    /**
     * Invalid credentials.
     */
    case INVALID_CREDENTIALS = '999';
}
