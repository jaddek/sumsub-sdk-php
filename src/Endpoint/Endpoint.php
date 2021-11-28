<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Endpoint;

use Jaddek\Sumsub\Http\Signer;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

abstract class Endpoint
{
    public function __construct(
        protected HttpClientInterface $sumsubClient,
        protected Signer              $signer,
        protected ?LoggerInterface    $logger = null
    )
    {

    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    protected function request(string $method, string $url, array $options = []): ResponseInterface
    {
        try {
            return $this->doRequest($method, $url, $options);
        } catch (ClientException $exception) {
            $response = $exception->getResponse();

            $this->logger?->debug(sprintf('%s:%s:response', __CLASS__, __FUNCTION__), [
                'response' => [
                    'content' => $response->getContent(false),
                    'headers' => $response->getHeaders(false)
                ]
            ]);

            return $response;
        }
    }

    protected function doRequest(string $method, string $uri, array $options = []): ResponseInterface
    {
        $finalOptions = array_merge($options, [
            'headers' => $this->signer->sign($method, $uri, $options['json'] ?? null)
        ]);

        $this->logger?->debug(sprintf('%s:%s:request', __CLASS__, __FUNCTION__), [
            'request' => [
                'url'     => $uri,
                'method'  => $method,
                'options' => $finalOptions
            ]
        ]);

        $response = $this->sumsubClient->request($method, $uri, $finalOptions);

        $this->logger?->debug(sprintf('%s:%s:response', __CLASS__, __FUNCTION__), [
            'response' => [
                'content' => $response->getContent(false),
                'headers' => $response->getHeaders()
            ]
        ]);

        return $response;
    }
}