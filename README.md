# Sumsub integration

```php
<?php

require_once('../vendor/autoload.php');

$apiToken    = '';
$secretToken = '';
$userId      = '';
$levelName   = 'demo';

$endpoint = \Jaddek\Sumsub\Http\Factory::buildEndpoint(
    \Jaddek\Sumsub\Http\Endpoint\AccessToken::class,
    $apiToken,
    $secretToken
);

$provider = new \Jaddek\Sumsub\Http\Provider\AccessTokenProvider($endpoint);
$data     = $provider->getAccessToken(
    new \Jaddek\Sumsub\Http\Query\AccessToken\AccessTokenQuery(
        $userId,
        $levelName
    )
);

print_r($data);
```
