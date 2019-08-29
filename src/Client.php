<?php


namespace Mobly\PaypalStc\Sdk;


use Mobly\PaypalStc\Sdk\Entities\AbstractEntity;

/**
 * Client class
 *
 * @package Mobly\PaypalStc\Sdk
 *
 * @author Filipe Shigueru <filipe.higuchi@mobly.com.br>
 * @author Mangierre Martins <mangierre.martins@mobly.com.br>
 *
 */
class Client extends AbstractEntity
{
    /**
     * @param $transaction
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function transaction($transaction){}
}