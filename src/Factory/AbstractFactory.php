<?php

namespace Mobly\PaypalStc\Sdk\Factory;

use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;

/**
 * Class AbstractFactory
 * @package Shared\PaypalPlus\Factory\Sender
 */
abstract class AbstractFactory
{
    public abstract function attach(TransferSalesOrder $order, $entity);
}
