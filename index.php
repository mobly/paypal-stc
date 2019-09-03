<?php
require __DIR__ . '/vendor/autoload.php';

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Command\Risk;
use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\Transaction;
use Mobly\PaypalStc\Sdk\Interfaces\PaymentInterface;

$paypalPlusMerchantId = "12345";
$trackingId = 'abcde12345';
$token = 'abcfr1234';
$url = 'http://www.paypal.com';

$risk = new Risk($paypalPlusMerchantId, $trackingId);
$receiver = new Receiver();
$order = new Transaction();


$sender = new \Mobly\PaypalStc\Sdk\Entities\Sender();
$sender->setSenderFirstName('João')
    ->setSenderLastName('João')
    ->setSenderPhone(11123451234);
    //other fields ...


$receiver->setBusinessName('Mobly');
$receiver->setReceiverEmail('paypal@paypal.com');
$receiver->setReceiverAccountId('paypal@paypal.com');
$receiver->setReceiverAddressState('SP');
$receiver->setReceiverAddressCity('São Paulo');
$receiver->setReceiverAddressCountryCode(PaymentInterface::PAYMENT_CURRENCY);
$receiver->setReceiverAddressZip('00000-000');
$receiver->setReceiverAddressLine1('1234512345');
$receiver->setReceiverAddressLine2('1234512345');
$receiver->setVertical('marketplaces');
$receiver->setTransactionIsTangible(true);

$transaction = new Transaction();
$transaction->setSender($sender)
    ->setReceiver($receiver);

$client = new Client($token, $url);
$risk  = new Risk($paypalPlusMerchantId, $trackingId);

try {
    $risk->registerRisk($client, $transaction);
    $risk->retrieveRisk($client);
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    die($e->getMessage());
} catch (Exception $e) {
    die($e->getMessage());
}
