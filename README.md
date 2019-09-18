<p align="center">
    <img src="https://www.mobly.com.br/images/mobly4/logo-mobly4.svg" width="250">
</p>

<p><img src="https://github.com/mobly/paypal-stc/workflows/PHP%20Default%20Workflow/badge.svg"></p>

# Mobly PayPal-STC-SDK
Simple SDK to make an standardize paypal stc integration

## How to use

Make a Payment Transaction:

``` PHP
require __DIR__ . '/vendor/autoload.php';

use Mobly\PaypalStc\Sdk\Client;
use Mobly\PaypalStc\Sdk\Command\Risk;
use Mobly\PaypalStc\Sdk\Entities\Receiver;
use Mobly\PaypalStc\Sdk\Entities\Transaction;
use Mobly\PaypalStc\Sdk\Interfaces\PaymentInterface;

$paypalPlusMerchantId = "my-merchant-id";
$trackingId = 'my-tracking';
$token = 'my-token';
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
// other fields ...

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

```