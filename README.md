![JCID](docs/images/jcid.png "JCID") ♥ ![Voys](docs/images/voys.png "Voys")

[![Scrutinizer build status](https://img.shields.io/scrutinizer/build/g/jcid/voys-api-wrapper.svg)](https://scrutinizer-ci.com/g/JCID/voys-api-wrapper/build-status/master)
[![Scrutinizer quality score](https://img.shields.io/scrutinizer/g/jcid/voys-api-wrapper.svg?style=flat-square)](https://scrutinizer-ci.com/g/jcid/voys-api-wrapper)
[![Software license](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Packagist version](https://img.shields.io/packagist/v/jcid/voys-api-wrapper.svg?style=flat-square)](https://packagist.org/packages/jcid/voys-api-wrapper)
[![Packagist total downloads](https://img.shields.io/packagist/dt/jcid/voys-api-wrapper.svg?style=flat-square)](https://packagist.org/packages/jcid/voys-api-wrapper)
![StyleCI](https://styleci.io/repos/88093404/shield?branch=master)

# Voys call API wrapper

An [Voys](https://www.voys.nl) API wrapper for the click to dial flow.

## Installation

Using [Composer](https://getcomposer.org):

```sh
composer require jcid/voys-api-wrapper
```

## Example usages

Fill in your Voys login credentials, with your e-mail address and password. Fill in the phone number you want to call to go and see will get additional outgoing phone which others in their display. Note, this should be a number of Voys.

```php
<?php
use Jcid\Voys\Voys;

$voys = new Voys('email@example.com', 'password');
$callId = $voys->callPhonenumer('0123456789', '0123456789');

echo $callId;
```

Fetch the status of the call by the returned `$callId` after you have started an call.

```php
<?php
use Jcid\Voys\Voys;

$voys = new Voys('email@example.com', 'password');
$callId = $voys->callPhonenumer('0123456789', '0123456789');
$callStatus = $voys->getCallStatus($callId);

echo $callStatus;
```

The possible statussen of an call could be one of the following

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

## Voys documentation

[Check out the 'Klik en bel' documentation by Voys](https://help.voys.nl/index.php/Klik_en_bel)
