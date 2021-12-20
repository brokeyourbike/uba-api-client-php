<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\UnitedBank\Enums;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 *
 * @method static ErrorCodeEnum SUCCESS()
 * @method static ErrorCodeEnum INVALID_SCHEME_TYPE()
 * @method static ErrorCodeEnum INVALID_ACCOUNT_NUMBER()
 * @method static ErrorCodeEnum UNSUPPORTED_REQUEST_FUNCTION()
 * @method static ErrorCodeEnum INSUFFICIENT_FUNDS()
 * @method static ErrorCodeEnum TRANSACTION_NOT_PERMITTED()
 * @method static ErrorCodeEnum WITHDRAWAL_AMOUNT_LIMIT_EXCEEDED()
 * @method static ErrorCodeEnum FORMAT_ERROR()
 * @method static ErrorCodeEnum DATA_RETRIEVAL_ERROR()
 * @method static ErrorCodeEnum MISSING_COUNTRY_CODE()
 * @method static ErrorCodeEnum INVALID_DATA_TYPE()
 * @method static ErrorCodeEnum BANK_CONFIG_ERROR()
 * @method static ErrorCodeEnum SOL_CONFIG_ERROR()
 * @method static ErrorCodeEnum UNKNOWN_ERROR()
 * @method static ErrorCodeEnum SECURITY_VIOLATION_LEVEL_0()
 * @method static ErrorCodeEnum SECURITY_VIOLATION_LEVEL_1()
 * @method static ErrorCodeEnum INVALID_CHEQUE_STATUS()
 * @method static ErrorCodeEnum TRANSFER_LIMIT_EXCEEDED()
 * @method static ErrorCodeEnum CHEQUES_ARE_IN_DIFFERENT_BOOKS()
 * @method static ErrorCodeEnum NOT_ALL_CHEQUES_COULD_BE_STOPPED()
 * @method static ErrorCodeEnum CHEQUE_NOT_ISSUED_TO_ACCOUNT()
 * @method static ErrorCodeEnum ACCOUNT_CLOSED()
 * @method static ErrorCodeEnum INVALID_CURRENCY()
 * @method static ErrorCodeEnum BLOCK_NOT_FOUND()
 * @method static ErrorCodeEnum CHEQUE_STOPPED()
 * @method static ErrorCodeEnum INVALID_RATE_CURRENCY_COMBINATION()
 * @method static ErrorCodeEnum CHEQUE_BOOK_ALREADY_ISSUED()
 * @method static ErrorCodeEnum DD_ALREADY_PAID()
 * @method static ErrorCodeEnum NETWORK_MESSAGE_WAS_ACCEPTED()
 * @method static ErrorCodeEnum INVALID_TRANSACTION_CODE()
 * @method static ErrorCodeEnum CUT_OVER_IN_PROGRESS()
 * @method static ErrorCodeEnum SERVICE_ERROR()
 * @method static ErrorCodeEnum SERVICE_TIMEOUT()
 * @method static ErrorCodeEnum DUPLICATE_STAN()
 * @method static ErrorCodeEnum INVALID_REQUEST_JSON()
 * @method static ErrorCodeEnum INVALID_TRANSACTION_ID()
 * @method static ErrorCodeEnum COUNTRIES_MISSMATCH()
 * @method static ErrorCodeEnum INVALID_CREDENTIALS()
 * @psalm-immutable
 */
final class ErrorCodeEnum extends \MyCLabs\Enum\Enum
{
    /**
     * Successful request.
     */
    private const SUCCESS = '000';

    /**
     * Invalid Scheme Type.
     */
    private const INVALID_SCHEME_TYPE = '111';

    /**
     * Invalid Account Number.
     */
    private const INVALID_ACCOUNT_NUMBER = '114';

    /**
     * Requested function not supported.
     */
    private const UNSUPPORTED_REQUEST_FUNCTION = '115';

    /**
     * Insufficient funds.
     */
    private const INSUFFICIENT_FUNDS = '116';

    /**
     * Transaction not permitted to card holder.
     */
    private const TRANSACTION_NOT_PERMITTED = '119';

    /**
     * Withdrawal amount limit exceeded.
     */
    private const WITHDRAWAL_AMOUNT_LIMIT_EXCEEDED = '121';

    /**
     * Format error(Sent by Web Service).
     */
    private const FORMAT_ERROR = '133';

    /**
     * Data retrieval error.
     */
    private const DATA_RETRIEVAL_ERROR = '134';

    /**
     * Country Code is missing.
     */
    private const MISSING_COUNTRY_CODE = '135';

    /**
     * Invalid data type.
     */
    private const INVALID_DATA_TYPE = '136';

    /**
     * Configuration error! Unable to retrieve bank details.
     */
    private const BANK_CONFIG_ERROR = '137';

    /**
     * Configuration error! Unable to retrieve SOL details.
     */
    private const SOL_CONFIG_ERROR = '138';

    /**
     * Unknown error. Check the service logs.
     */
    private const UNKNOWN_ERROR = '139';

    /**
     * Security violation.
     */
    private const SECURITY_VIOLATION_LEVEL_0 = '140';

    /**
     * Security violation.
     */
    private const SECURITY_VIOLATION_LEVEL_1 = '141';

    /**
     * Invalid Cheque Status.
     */
    private const INVALID_CHEQUE_STATUS = '163';

    /**
     * Transfer Limit Exceeded.
     */
    private const TRANSFER_LIMIT_EXCEEDED = '180';

    /**
     * Transfer Limit Exceeded.
     */
    private const CHEQUES_ARE_IN_DIFFERENT_BOOKS = '181';

    /**
     * Not all Cheques could be stopped.
     */
    private const NOT_ALL_CHEQUES_COULD_BE_STOPPED = '182';

    /**
     * Cheque not issued to this account.
     */
    private const CHEQUE_NOT_ISSUED_TO_ACCOUNT = '183';

    /**
     * Account closed.
     */
    private const ACCOUNT_CLOSED = '184';

    /**
     * Invalid currency.
     */
    private const INVALID_CURRENCY = '185';

    /**
     * Block does not exist.
     */
    private const BLOCK_NOT_FOUND = '186';

    /**
     * Cheque stopped.
     */
    private const CHEQUE_STOPPED = '187';

    /**
     * Invalid Rate Currency Combination.
     */
    private const INVALID_RATE_CURRENCY_COMBINATION = '188';

    /**
     * Invalid Rate Currency Combination.
     */
    private const CHEQUE_BOOK_ALREADY_ISSUED = '189';

    /**
     * DD Already Paid.
     */
    private const DD_ALREADY_PAID = '190';

    /**
     * Network message was accepted.
     */
    private const NETWORK_MESSAGE_WAS_ACCEPTED = '800';

    /**
     * Invalid transaction/ function code.
     */
    private const INVALID_TRANSACTION_CODE = '902';

    /**
     * Cut-over in progress.
     * (When DC is generating PBF, it will give this result code).
     */
    private const CUT_OVER_IN_PROGRESS = '906';

    /**
     * CBA Inoperative
     * (Confirm status before retrying/repeating the transaction)
     */
    private const SERVICE_ERROR = '907';

    /**
     * Service timed out, status is unknown
     * (Confirm status before retrying/repeating the transaction)
     */
    private const SERVICE_TIMEOUT = '911';

    /**
     * Duplicate STAN.
     */
    private const DUPLICATE_STAN = '913';

    /**
     * Please provide valid JSON request.
     */
    private const INVALID_REQUEST_JSON = '990';

    /**
     * Invalid TransactionID.
     */
    private const INVALID_TRANSACTION_ID = '995';

    /**
     * Source and Destination countries are different.
     */
    private const COUNTRIES_MISSMATCH = '998';

    /**
     * Invalid credentials.
     */
    private const INVALID_CREDENTIALS = '999';
}
