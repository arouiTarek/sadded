## Sadded package (Payments)

```bash
composer require shahdah/sadded
```

## example

```php
<?php

use Shahdah\Sadded\Sadded;

require __DIR__ . '/vendor/autoload.php';

/** Data  */

$customerData = [
    'full_name'     => 'test test',
    'email'         => 'test@test.test',
    'country_code'  => '213',
    'phone_number'  => '554668588',
];
$credentials = [
    'token' => "sk_test_tkZE18afpNM0XvqBx9lhinAV"
];

// step 01 create provider
$sadded = new Sadded('tap');
// step 02 extract getway
$getway = $sadded->getway();
// step 03 set Credentials
$getway->setCredentials($credentials);
// step 04 set Callback url
$getway->setCallbackUrl('http://127.0.0.1/callback');
// step 05 create customer
$customer = $getway->customer($customerData);
// step 06 charge
$charge = $customer->charge(10, "KWD");


dd($charge);

```
