<?php


namespace Mobly\PaypalStc\Sdk;




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

    protected $token;

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
    }

    /**
     * @param $url
     * @param $data
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, $data)
    {
        $url = $this->url . $url;
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
        $url = $this->url . $uri;
        $response = $this->client->request(
            self::PUT,
            $url,
            [$data]
        );

        return $response;
    }

    /**
     * @param $uri
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($uri)
    {
        $url = $this->url . $uri;

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transaction($transaction){}

}