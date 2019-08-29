<?php

namespace Mobly\PaypalStc\Sdk\Interfaces;

interface StatusInterface
{
    const PAYMENT_STATUS_CREATED = 'created';

    const PAYMENT_STATUS_APPROVED = 'approved';

    const PAYMENT_STATUS_FAILED = 'failed';

    const PAYMENT_STATUS_PENDING = 'pending';

    const PAYMENT_STATUS_COMPLETED = 'completed';

    const IPN_STATUS_VERIFIED = 'VERIFIED';

    const IPN_STATUS_INVALID = 'INVALID';
}
