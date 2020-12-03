# TinySRC PHP SDK

This is a PHP package for accessing [TinySRC API](http://api.tinysrc.me/).

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)

## What is TinySRC?

Free Tiny URL Shortener Service with a detailed statistic and extended features.

## How to get Started

To get started working with TinySRC PHP SDK, you need register and get your personal API Key first.  

## Installing TinySRC-PHP-SDK

The recommended way to install tinysrc-php-sdk is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of tinysrc-php-sdk:

```bash
composer.phar require dmitrypro77/tinysrc-php-sdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update tinysrc-php-sdk using Composer:

 ```bash
composer.phar update
 ```

## How to use TinySRC PHP SDK

This SDK follow by [PSR-18](https://www.php-fig.org/psr/psr-18/) (HTTP Client) specification, therefore you can use any client which implement ClientInterface: Guzzle, Symfony HttpClient etc...

Guzzle example:
```php
$httpClient = new \GuzzleHttp\Client();

// Keep your API key safe and we strongly recommend use env variables to store api key
$client = new \Tinysrc\Client($httpClient, 'YOUR_API_KEY'); 
```

OR

Symfony HttpClient example:
```php
$httpClient = new \Symfony\Component\HttpClient\Psr18Client();

// Keep your API key safe and we strongly recommend use either env variables or database to store api key
$client = new \Tinysrc\Client($httpClient, 'YOUR_API_KEY'); 
```

### Get List URL

```php
$linkRepository = new \Tinysrc\Repository\LinkRepository($tinyClient);
// not required params $limit, $page, $query (search by hash, link etc...)
$response = $linkRepository->find(10, 1, '');

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

/** @var \Tinysrc\Response\LinkResponse $result */
$result = $response->getData();
var_dump($result->getData()); // data
var_dump($result->getTotal()); // total record

/** @var \Tinysrc\Response\LinkItemResponse $link */
foreach ($result->getData() as $link) {
    echo $link->getUrl().PHP_EOL;
    if ($link->isAuthRequired()) {
        echo $link->getPassword().PHP_EOL;
    }
    echo $link->getStatUrl().PHP_EOL;
    echo $link->getStatPassword().PHP_EOL;
}
```

### Create shortened url

```php
$linkRepository = new \Tinysrc\Repository\LinkRepository($tinyClient);
$link = new \Tinysrc\Model\Link();
$link->setUrl("http://test.com");
$link->setPassword("test"); // optional
$link->setAuthRequired(true); // optional
$date = new DateTime("tomorrow");
$link->setExpirationTime($date->format("Y-m-d H:i")); // optional

$response = $linkRepository->add($link);

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

/** @var \Tinysrc\Response\LinkItemResponse $result */
$result = $response->getData();

echo $result->getUrl().PHP_EOL; // tiny url
echo $result->getPassword().PHP_EOL;
echo $result->getStatUrl().PHP_EOL;
echo $result->getStatPassword().PHP_EOL;
```

### Find Details By Hash

```php
$linkRepository = new \Tinysrc\Repository\LinkRepository($tinyClient);

$response = $linkRepository->findByHash("hash");

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

/** @var \Tinysrc\Response\LinkItemDetailedResponse $result */
$result = $response->getData();
echo $result->getUrl().PHP_EOL; // tiny url
echo $result->isActive().PHP_EOL;
echo $result->isAuthRequired().PHP_EOL;
echo $result->getBots().PHP_EOL;
echo $result->getClicks().PHP_EOL;
echo $result->getQrCode().PHP_EOL;
echo $result->getPassword().PHP_EOL;
echo $result->getStatUrl().PHP_EOL;
echo $result->getStatPassword().PHP_EOL;
```


### Activate/Deactivate Link

```php
$linkRepository = new \Tinysrc\Repository\LinkRepository($tinyClient);

// Activate
$response = $linkRepository->activate("hash");

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

// Deactivate
$response = $linkRepository->deactivate("hash");

if (!$response->isSuccess()) {
    // Errors Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}
```

### Current User Info

```php
$userRepository = new \Tinysrc\Repository\UserRepository($tinyClient);

// Activate
$response = $userRepository->current();

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

/** @var \Tinysrc\Response\UserResponse $result */
$result = $response->getData();

echo $result->isActive();
echo $result->getUsername();
echo $result->getEmail();
echo $result->getApiKey();
echo $result->getPlan();
echo $result->isBanned();
```


### Statistics by hash

```php
$statRepository = new \Tinysrc\Repository\StatRepository($tinyClient);

$response = $statRepository->findByHash("test");

if (!$response->isSuccess()) {
    // Error Happened
    var_dump($response->getErrors()); // Errors
    var_dump($response->getValidations()); // Validations Errors
}

/** @var \Tinysrc\Response\StatResponse $result */
$result = $response->getData();

echo $result->getTotal(); // total record

/** @var \Tinysrc\Response\StatItemResponse $stat */
foreach ($result->getData() as $stat) {
    echo $stat->getBrowser().PHP_EOL;
    echo $stat->getBrowserVersion().PHP_EOL;
    echo $stat->getPlatform().PHP_EOL;
    echo $stat->getOs().PHP_EOL;
    echo $stat->getIp().PHP_EOL;
    echo $stat->getReferer().PHP_EOL;
}

```

## Dependencies

- PHP >=7.3
- ext-json

## Contributing

Please note that this package still is in development.

**Pull requests are welcome**.

## Links

- https://tinysrc.me/

## License

[MIT]