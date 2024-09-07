# qdl-sdk
Php client for QDL API (Quality Delivery Logistics

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
$qdl = new Janmuran\QdlSdk\Dql($client, $responseBuilder);

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
