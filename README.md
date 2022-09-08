## Sadded package (Payments)

```bash
composer require shahdah/sadded
```

## example

```php
<?php

use Shahdah\Sadded\Sadded;

require __DIR__ . '/vendor/autoload.php';

// Create Provider
$provider = new Sadded('Tap');
// make getway
$getway = $provider->getway();

$customerData = [
    'full_name'     => 'test test',
    'email'         => 'test@test.test',
    'country_code'  => '213',
    'phone_number'  => '554668588',
];
$credential = [
    'token' => "sk_test_tkZE18afpNM0XvqBx9lhinAV"
];
$getway->setCredential($credential);
$getway->setCustomerData($customerData);
$getway->setCallbackUrl('https://github.com');
$checkout = $getway->charge(79, 'KWD');

print_r($checkout->getResponse());
print_r($checkout->getPaymentUrl());
```
