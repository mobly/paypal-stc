<?php

namespace Mobly\PaypalStc\Sdk\Command;

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Interfaces\StatusInterface;

class Ipn
{
    /**
     * @param Client $client
     * @param $data
     * @param $url
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function ack(Client $client, $data, $url)
    {
        try {
            //@todo trait response ...
            $client->post(
                $url,
                $data
            );
            return StatusInterface::IPN_STATUS_VERIFIED;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }

        return StatusInterface::IPN_STATUS_INVALID;
    }
}
