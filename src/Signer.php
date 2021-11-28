<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http;

use JsonSerializable;
use DateTimeImmutable;
use DateTimeZone;
use Exception;
use JsonException;

class Signer
{
    private const BODY_ALGO = 'sha256';

    public function __construct(
        private string $apiToken,
        protected string $secretToken
    )
    {
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array|JsonSerializable|null $body
     * @return array
     * @throws JsonException
     * @throws Exception
     */
    public function sign(string $method, string $uri, null|array|JsonSerializable $body = null): array
    {
        $payload = null;
        if (is_array($body) || $body instanceof JsonSerializable) {
            $payload = json_encode($body, JSON_THROW_ON_ERROR);
        }

        $ts  = (string)(new DateTimeImmutable('now', new DateTimeZone('UTC')))->getTimestamp();
        $sig = $this->getSignature($method, $uri, $ts, $payload);

        return [
            'Content-Type'     => 'application/json',
            'Accept'           => 'application/json',
            'X-App-Token'      => $this->apiToken,
            'X-App-Access-Sig' => $sig,
            'X-App-Access-Ts'  => $ts,
        ];
    }

    private function getSignature(string $method, string $endpoint, string $ts, ?string $payload = null): string
    {
        $data = $ts . strtoupper($method) . $endpoint;

        if ($payload !== null) {
            $data .= $payload;
        }

        return hash_hmac(self::BODY_ALGO, $data, $this->secretToken);
    }
}
