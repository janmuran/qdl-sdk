# qdl-sdk
Php client for QDL API (Quality Delivery Logistics

###Laravel setup
1. Install package
```bash
composer require janmuran/qdl-sdk
```
2. Add config to config/qdl.php
```php
return [
    'login' => env('QDL_API_LOGIN'),
    'password' => env('QDL_API_PASSWORD'),
    'url' => env('QDL_API_URL'),
];
```
3. Add env variables to .env
```dotenv
QDL_API_LOGIN=
QDL_API_PASSWORD=
QDL_API_URL=https://qdl.sk
```
4. Add service provider app/Providers/AppServiceProvider.php
```php
$this->app->when(Config::class)
      ->needs('$login')->give(config('qdl.login'));
$this->app->when(Config::class)
       ->needs('$password')->give(config('qdl.password'));
$this->app->when(Config::class)
       ->needs('$baseUri')->give(config('qdl.url'));
```



Example:
```php
$login = '';
$pass = '';
$sender = 1;

require_once __DIR__ . '/../../vendor/autoload.php';

$config = new Janmuran\QdlSdk\Config\Config($login, $pass, 'https://qdl.sk');
$client = new Janmuran\QdlSdk\Client\Client($config);
$serializer =  JMS\Serializer\SerializerBuilder::create()->build();
$responseBuilder = new Janmuran\ObjectBuilder\ResponseBuilder($serializer);
$qdl = new Janmuran\QdlSdk\Qdl($client, $responseBuilder);

$shipments = new Janmuran\QdlSdk\Model\Shipments();

$date = new DateTimeImmutable();

$shipment = new Janmuran\QdlSdk\Model\Shipment(
    '123456',
    $date->format('d.m.Y'),
    0.0,
    '',
    '',
    'Test note',
    new \Janmuran\QdlSdk\Model\Sender(
        1,
        0,
        'Name Surname',
        'Hlavna 1',
        '84545',
        'Bratislava',
        'SK'
    ),
    new \Janmuran\QdlSdk\Model\Recipient(
        'Jan Muran',
        'Hlavna 1',
        '84545',
        'Bratislava',
        'SK',
        '+421949123456',
        'test@qdl.sk',
        'Name Surname'
    ),
    \Janmuran\QdlSdk\Model\Insurance::createNoInsurance(),
    new \Janmuran\QdlSdk\Model\Services(false, false, true, true, false, 'test@qdl.sk'),
    [
        new \Janmuran\QdlSdk\Model\Item(10.0, '1123')
    ]
);

$shipments->addShipment($shipment);

$response = $qdl->sendShipments($shipments);
print_r($response->getShipments());
print_r($response->getShipmentNumbersByRef());
```
