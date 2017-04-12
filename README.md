# Voys call API wrapper

An Voys API wrapper for the click to dial flow.

## Installation

Using Composer:

```sh
composer require jcid/voys-api-wrapper
```

## Example usages

```php
<?php
use Jcid\Voys\Voys;

$voys = new Voys('email@example.com', 'password');
$callId = $voys->callPhonenumer('0123456789', '0123456789');

echo $callId;
```

Fetch the status of the call by the given `$callId`

```php
<?php
use Jcid\Voys\Voys;

$voys = new Voys('email@example.com', 'password');
$callId = $voys->callPhonenumer('0123456789', '0123456789');
$callStatus = $voys->getCallStatus($callId);

echo $callStatus;
```

The possible statussen from the API

```php
<?php
use Jcid\Voys\VoysCallStatus;

VoysCallStatus::STATUS_NULL
VoysCallStatus::DIALING_A
VoysCallStatus::DIALING_B
VoysCallStatus::CONNECTED
VoysCallStatus::DISCONNECTED
VoysCallStatus::FAILING_A
VoysCallStatus::FAILING_B
```
