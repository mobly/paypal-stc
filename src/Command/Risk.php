<?php

namespace Mobly\PaypalStc\Sdk\Command;

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\Sender;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Factory\Sender\Customer as SenderCustomerFactory;
use Mobly\PaypalStc\Sdk\Factory\Sender\Address as SenderAddressFactory;
use Mobly\PaypalStc\Sdk\Factory\Receiver\Address as ReceiverAddress;

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
     * @var
     */
    protected $trustedBuyerConfig;

    /**
     * Risk constructor.
     * @param $paymentExtConfig
     * @param $trackingId
     */
    public function __construct($paymentExtConfig, $trackingId)
    {
        $this->merchantId = $paymentExtConfig['paypal_plus_merchant_id'] ?? null;
        $this->trustedBuyerConfig = $paymentExtConfig['paypal_trusted_buyer'] ?? null;

        $this->trackingId = $trackingId;
    }

    /**
     * @param Client $client
     * @param TransferSalesOrder $order
     * @param $config
     * @return \Zend_Http_Response
     * @throws \Zend_Http_Client_Exception
     */
    public function registerRisk(Client $client, TransferSalesOrder $order, $config)
    {
        $data = $this->getData($order, $config);

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

        return $response;
    }

    /**
     * @param Client $client
     * @return bool
     */
    public function retrieveRisk(Client $client)
    {
        return $client->get(
            $this->getUri()
        );
    }

    /**
     * @param TransferSalesOrder $order
     * @param $config
     * @return array
     */
    public function getData(TransferSalesOrder $order, $config)
    {
        $sender = new Sender();
        $receiver = new Receiver();

        $sender->setSenderSignupId($order->getUserHostAddress());
        $receiver->setCdStringOne(
            $this->customerHasOrders(
                $order->getIdCustomer()
            )
        );

        $customer = new SenderCustomerFactory();
        $address = new SenderAddressFactory();

        $receiverFactory = new ReceiverAddress($config);

        $customer->attach($order, $sender);
        $address->attach($order, $sender);
        $receiverFactory->attach($order, $receiver);

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

    /**
     * @param null $idCustomer
     * @return int
     */
    private function customerHasOrders($idCustomer = null)
    {
        if ($this->trustedBuyerConfig == '0' || $this->trustedBuyerConfig == '1') {
            return (int) $this->trustedBuyerConfig;
        }

        if (empty($idCustomer)) {
            return 0;
        }

        $orders = \Session::get('customer_orders');

        if (!empty($orders) && $orders instanceof \Transfer_Sales_OrderCollection && $orders->isFilled()) {
            return $orders->count() ? 1 : 0;
        }

        $adapter = \GenericModel::getAdapterByName('BobAdapter');
        $bobResult = $adapter->get('CustomerOrders', false, false, array('customerId' => $idCustomer, 'fk_store' => 1));

        if ($bobResult->isSuccess()) {
            $orders = $bobResult->getResultData();
            \Session::add('customer_orders', $orders);

            return $orders->count() ? 1 : 0;
        }

        return 0;
    }

}
