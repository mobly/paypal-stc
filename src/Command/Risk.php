<?php

namespace Mobly\PaypalStc\Sdk\Command;

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\Sender;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Factory\Sender\Customer as SenderCustomerFactory;
use Mobly\PaypalStc\Sdk\Factory\Sender\Address as SenderAddressFactory;

class Risk
{
    /**
     * %s = merchant_id
     * %s = tracking_id
     */
    CONST ENDPOINT_V1 = 'v1/risk/transaction-contexts/%s/%s';

    /**
     * @var
     */
    protected $merchantId;

    /**
     * @var
     */
    protected $trackingId;

    /**
     * Risk constructor.
     * @param null $paypalPlusMerchantId
     * @param $trackingId
     */
    public function __construct($paypalPlusMerchantId, $trackingId)
    {
        $this->merchantId = $paypalPlusMerchantId;
        $this->trackingId = $trackingId;
    }

    /**
     * @param Client $client
     * @param TransferSalesOrder $order
     * @param Receiver $receiver
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registerRisk(Client $client, TransferSalesOrder $order, Receiver $receiver)
    {
        $data = $this->getData($order, $receiver);

        $log = [];
        $log['request'] = [
            'title' => 'PayPalPlus risk request ' . $this->getUri(),
            'message' => $data,
            'file' => 'paypalplus_communication.log'
        ];

        $response = $client->put(
            $this->getUri(),
            $data
        );

        $log['request'] = [
            'title' => 'PayPalPlus risk response ' . $this->getUri(),
            'message' => $response,
            'file' => 'paypalplus_communication.log'
        ];

        return [$response, $log];
    }

    /**
     * @param Client $client
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function retrieveRisk(Client $client)
    {
        return $client->get(
            $this->getUri()
        );
    }

    /**
     * @param TransferSalesOrder $order
     * @param Receiver $receiver
     * @return array
     */
    public function getData(TransferSalesOrder $order, Receiver $receiver)
    {
        $sender = new Sender();

        $sender->setSenderSignupId($order->getUserHostAddress());
        $receiver->setCdStringOne($order->getCustomerHasOrders());

        $customer = new SenderCustomerFactory();
        $address = new SenderAddressFactory();

        $customer->attach($order, $sender);
        $address->attach($order, $sender);

        $data = array_merge($sender->toArray(), $receiver->toArray());

        $stc = [];
        foreach ($data as $key => $value) {
            $stc[] = [
                'key' => $key,
                'value' => $value,
            ];
        }

        return [
            'additional_data' => $stc
        ];
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return sprintf(self::ENDPOINT_V1, $this->merchantId, $this->trackingId);
    }

}
