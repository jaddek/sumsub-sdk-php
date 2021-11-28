<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http;

use Jaddek\Sumsub\Http\Endpoint\Endpoint;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class EndpointCollection
{
    private static array $instances = [];

    public function __construct(
        private HttpClientInterface $sumsubClient,
        private Signer              $signer,
        private ?LoggerInterface    $logger = null
    )
    {

    }

    private function getEndpoint(string $class): mixed
    {
        if (!(self::$instances[$class] ?? null) instanceof Endpoint) {
            self::$instances[$class] = new $class($this->sumsubClient, $this->signer, $this->logger);
        }

        return self::$instances[$class];
    }
}