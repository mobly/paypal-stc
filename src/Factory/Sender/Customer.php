<?php

namespace Mobly\PaypalStc\Sdk\Factory\Sender;

use Mobly\PaypalStc\Sdk\Entities\Sender;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Factory\AbstractFactory;

/**
 * Class Address
 * @package Shared\PaypalPlus\Factory
 */

class Customer extends AbstractFactory
{
    /**
     * @param TransferSalesOrder $order
     * @param Sender $sender
     * @return Sender
     */
    public function attach(TransferSalesOrder $order, $sender)
    {
        $sender->setSenderFirstName($order->getFirstName())
            ->setSenderLastName($order->getLastName())
            ->setSenderEmail($order->getEmail())
            ->setSenderTaxId($order->getCustomerDocument())
            ->setSenderPhone($order->getPhone())
            ->setSenderCreateDate($order->getCreatedAt())
            ->setSenderAccountId($order->getCustomerDocument());

        return $sender;
    }
}
