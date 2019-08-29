<?php

namespace Mobly\PaypalStc\Sdk\Factory\Receiver;

use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Factory\AbstractFactory;
use Mobly\PaypalStc\Sdk\Interfaces\PaymentInterface;
use Mobly\PaypalStc\Sdk\Utility\UString;

/**
 * Class Address
 * @package Shared\PaypalPlus\Factory
 */
class Address extends AbstractFactory
{
    /**
     * @var string
     */
    CONST CONFIGURATION_PREFIX = 'paypal_plus_';

    /**
     * @var array
     */
    protected $config;

    /**
     * Address constructor.
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param TransferSalesOrder $order
     * @param Receiver $receiver
     * @return $receiver
     */
    public function attach(TransferSalesOrder $order, $receiver)
    {
        $receiver->setBusinessName($order->getBusinessName())
            ->setReceiverEmail(
                $this->getDataOrNull('receiver_email')
            )
            ->setReceiverAccountId(
                $this->getDataOrNull('receiver_email')
            )
            ->setReceiverAddressState(
                $this->getDataOrNull('receiver_address_state')
            )
            ->setReceiverAddressCity(
                $this->getDataOrNull('receiver_address_city')
            )
            ->setReceiverAddressCountryCode(
                PaymentInterface::PAYMENT_CURRENCY
            )
            ->setReceiverAddressZip(
                $this->getDataOrNull('receiver_address_zip')
            )
            ->setReceiverAddressLine1(
                $this->getDataOrNull('receiver_address_line1')
            )
            ->setReceiverAddressLine2(
                $this->getDataOrNull('receiver_address_line2')
            )
            ->setVertical('marketplaces')
            ->setTransactionIsTangible(true);

        return $receiver;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    private function getDataOrNull($key)
    {
        $key = self::CONFIGURATION_PREFIX . $key;

        return $this->config[$key] ?? null;
    }
}