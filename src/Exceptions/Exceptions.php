<?php

namespace Mobly\PaypalStc\Sdk\Entities;

class Exceptions
{

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $message;

    protected $auth = [
        'INSTRUMENT_DECLINED',
        'CREDIT_CARD_REFUSED',
        'TRANSACTION_REFUSED_BY_PAYPAL_RISK',
        'PAYER_CANNOT_PAY',
        'PAYER_ACCOUNT_RESTRICTED',
        'PAYER_ACCOUNT_LOCKED_OR_CLOSED',
        'TRANSACTION_REFUSED'
    ];

    protected $retry = [
        'INTERNAL_SERVICE_ERROR'
    ];

    /**
     * @param \Exception $e
     * @throws AuthException
     * @throws FatalException
     * @throws RetryException
     */
    public function resolve(\Exception $e)
    {
        try {
            $data = json_decode($e->getData(), true);

            if (
                empty($data['name'])
            ) {
                throw new FatalException();
            }

            $errorKey = $data['name'];
        } catch (\Exception $e) {
            throw new FatalException();
        }

        $this->name = $data['name'] ?? null;
        $this->message = $data['message'] ?? null;

        if (in_array($errorKey, $this->auth)) {
            throw new AuthException();
        }

        if (in_array($errorKey, $this->retry)) {
            throw new RetryException();
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}
