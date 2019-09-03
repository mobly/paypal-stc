<?php

namespace Mobly\PaypalStc\Sdk;
use GuzzleHttp\Psr7\Request;
use Mobly\PaypalStc\Sdk\Exceptions;

/**
 * Client class
 *
 * @package Mobly\PaypalStc\Sdk
 *
 * @author Filipe Shigueru <filipe.higuchi@mobly.com.br>
 * @author Mangierre Martins <mangierre.martins@mobly.com.br>
 *
 */
class Client extends AbstractClient
{
    /**
     * Approval URL for Payment
     */
    const REST_LIVE_ENDPOINT = "https://api.sandbox.paypal.com/";

    /**
     * @var
     */
    protected $token;

    /**
     * @var
     */
    protected $url;

    /**
     * @var string
     */
    protected $merchantId;

    /**
     * Client constructor.
     * @param $token
     * @param $url
     */
    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->url = $url;
        parent::__construct();
    }

    /**
     * @return string
     */
    private function getUrl()
    {
        return self::REST_LIVE_ENDPOINT;
    }

    /**
     * @param $url
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, $data)
    {
        $url = $this->getUrl() . $url;
        $response = $this->client->request(
            self::POST,
            $url,
            [$data]
        );

        return $response;

    }

    /**
     * @param $uri
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function put($uri, $data)
    {
        try {
            $client = new \GuzzleHttp\Client(['base_uri' => $uri]);
            $headers = [
                'Authorization' => 'Bearer ' . $this->token,
                'Accept'        => 'application/json',
            ];

            $response = $client->request(self::PUT, 'bar', [
                'headers' => $headers
            ]);

        } catch (\Exception $e) {
            throw new \Exception($e);
        } catch (\Throwable $e) {
            throw new \Exception($e);
        }

        return $response;
    }

    /**
     * @param $uri
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($uri)
    {
        $url = $this->getUrl() . $uri;

        $headers = [
            'Authorization' => 'Bearer ' . $this->token,
            'Accept'        => 'application/json',
        ];

        $response = $this->client->request(
            self::GET,
            $url,
            [$headers]
        );
        return $response;
    }

    /**
     * @param $transaction
     * @return void
     */
    public function transaction($transaction){}

}