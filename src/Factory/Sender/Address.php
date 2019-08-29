<?php

namespace Mobly\PaypalStc\Sdk\Factory\Sender;


use Mobly\PaypalStc\Sdk\Entities\Sender;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Factory\AbstractFactory;
use Mobly\PaypalStc\Sdk\Interfaces\PaymentInterface;

/**
 * Class Address
 * @package Mobly\PaypalStc\Sdk\Factory
 */
class Address extends AbstractFactory
{
    /**
     * @param TransferSalesOrder $order
     * @param Sender $sender
     * @return Sender
     */
    public function attach(TransferSalesOrder $order, $sender)
    {
        $sender->setSenderAddressLine1($order->getAddress());
        $sender->setSenderAddressLine2($order->getStreetNumber());
        $sender->setSenderCountryCode(PaymentInterface::PAYMENT_CURRENCY);
        $sender->setSenderAddressState($order->getRegion());
        $sender->setSenderAddressCity($order->getCity());
        $sender->setSenderAddressZip($order->getPostcode());
        return $sender;
    }
}
