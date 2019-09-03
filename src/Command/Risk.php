<?php

namespace Mobly\PaypalStc\Sdk\Command;

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Entities\Transaction;

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
     * @param Transaction $transaction
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function registerRisk(Client $client, Transaction $transaction)
    {
        $data = $this->getData($transaction);

        $log = [];
        $log['request'] = [
            'title' => 'PayPalPlus risk request ' . $this->getUri(),
            'message' => $data,
            'file' => 'paypalplus_communication.log'
        ];

        $log['response'] = [
            'title' => 'PayPalPlus risk response ' . $this->getUri(),
            'message' => null,
            'file' => 'paypalplus_communication.log',
            'status' => null
        ];
        $responseRisk = [];

        try {
            $response = $client->put(
                $this->getUri(),
                $data
            );

            $log['response']['message'] = $response;
            $responseRisk['status'] = $response->getStatusCode();
            $responseRisk['message'] = $response->getBody();
        } catch (\Exception $e) {
            $responseRisk['status'] = $e->getCode();
            $responseRisk['message'] = null;
            $log['response']['message'] = $e->getMessage();
        }

        return [$responseRisk, $log];
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
     * @param Transaction $transaction
     * @return array
     */
    public function getData(Transaction $transaction)
    {
        $data = array_merge(
            $transaction->getSender()->toArray(),
            $transaction->getReceiver()->toArray()
        );

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
