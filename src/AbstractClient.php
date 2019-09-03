<?php


namespace Mobly\PaypalStc\Sdk;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

abstract class AbstractClient
{
    /**
     * @const string
     */
    const JSON = RequestOptions::JSON;

    /**
     * @const string
     */
    const POST = 'POST';

    /**
     * @const string
     */
    const GET = 'GET';

    /**
     * @const string
     */
    const PUT = 'PUT';

    /**
     * @var Client $client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }
}