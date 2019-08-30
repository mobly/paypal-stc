<?php
require __DIR__ . '/vendor/autoload.php';

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Command\Risk;
use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\TransferSalesOrder;
use Mobly\PaypalStc\Sdk\Interfaces\PaymentInterface;

$paypalPlusMerchantId = "12345";
$trackingId = 'abcde12345';
$token = 'abcfr1234';
$url = 'http://www.paypal.com';

$risk = new Risk($paypalPlusMerchantId, $trackingId);
$receiver = new Receiver();
$order = new TransferSalesOrder();

$order->setFirstName('João');
$order->setLastName('Santos');
$order->setPhone('11123451234');
$order->setCellPhone('11123451234');
$order->setEmail('joaosantos@paypal.com');
$order->setCustomerDocument('121231237');
$order->setAddress('Rua das árvores');
$order->setStreetNumber(1);
$order->setCountryCode('55');
$order->setRegion('SP');
$order->setCity('São Paulo');
$order->setPostcode('12345678');
$order->setBusinessName('Mobly');
$order->setUserHostAddress('www.mobly.com.br');
$order->setCustomerHasOrders(true);

$receiver->setBusinessName($order->getBusinessName());
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

try {
    list($response, $log) = $risk->registerRisk(
        new Client($token, $url),
        $order,
        $receiver
    );

    echo $response->getStatus();
    echo $response->getMessage();
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    die($e->getMessage());
} catch (Exception $e) {
    die($e->getMessage());
}
