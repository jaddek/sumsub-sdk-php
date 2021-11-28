<?php

namespace Jaddek\Sumsub\Http;

use Jaddek\Sumsub\Http\Endpoint\Endpoint;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Factory
{
    public static function buildCollection(string $apiToken, string $secretToken): EndpointCollection
    {
        $signer     = new Signer($apiToken, $secretToken);
        $httpClient = self::getHttpClient();

        return new EndpointCollection($httpClient, $signer);
    }

    public static function buildEndpoint(string $class, string $apiToken, string $secretToken): Endpoint
    {
        $signer     = new Signer($apiToken, $secretToken);
        $httpClient = self::getHttpClient();

        return new $class($httpClient, $signer);
    }

    private static function getHttpClient(): HttpClientInterface
    {
        return HttpClient::createForBaseUri(Sumsub::HOST_API);
    }

    protected static function getHost(): string
    {
        return Sumsub::HOST_API;
    }
}
