<?php

namespace Mobly\PaypalStc\Sdk\Interfaces;

interface PaymentInterface
{
    const PAYER_TAX_TYPE = 'BR_CPF';

    const PAYMENT_CURRENCY = 'BRL';

    const PAYER_COUNTRY = 'BR';

    const PAYER_LANGUAGE = 'pt_BR';

    const DIV_PLACEHOLDER = 'ppplus';

    const APPLICATION_MODE_TEST = 'sandbox';

    const APPLICATION_MODE_LIVE = 'live';

    const APPLICATION_BUTTON = 'continueButton';

    const APPLICATION_DISALLOW_REMEMBER_CARDS = false;
}
