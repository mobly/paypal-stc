<?php

namespace Mobly\PaypalStc\Sdk;
use GuzzleHttp\Psr7\Request;

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
     */
    public function put($uri, $data)
    {
        try {
            $url = 'https://api.sandbox.paypal.com/v1/risk/transaction-contexts/4EQA63KMCLY2N/11844533335';

            $request = new Request(
                'PUT',
                $url,
                [
                    'Authorization' => ['Basic QVh1dGJuV0FHR3RIOEpfa215aUtJeHduV1FUUUNaX3RtemgwemNmaTJtVk5mZFVhcHZPOFVyNE5kMHo1QWRRNWJqeEhBZUZSMndtbUhJSjc6RUVWb0VnMDk0TkhCNzAwaHlNVjB1WFVVMnZFRE1LdWQ3dzUxR2c3SG1lVExQN1h0NkdRUldCNzljSUx4d1AxYU8tUnhoLUZETGg5aHNPVlI='],
                ],
                json_encode($data));
            $response = $this->client->send($request);
        } catch (\Exception $e) {
            print_r($e->getMessage()); die;
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