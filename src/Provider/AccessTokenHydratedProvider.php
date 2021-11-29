<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Provider;

use Jaddek\Hydrator\Hydrator;
use Jaddek\Hydrator\Item;
use Jaddek\Sumsub\Http\Endpoint\AccessToken as AccessTokenEndpoint;
use Jaddek\Sumsub\Http\Response\AccessToken\AccessToken as AccessTokenResponse;
use Jaddek\Sumsub\Http\Query\AccessToken\AccessTokenQuery;
use Jaddek\Sumsub\Http\Query\AccessToken\ShareTokenQuery;
use Jaddek\Sumsub\Http\Response\AccessToken\ShareToken;

class AccessTokenHydratedProvider
{
    public function __construct(private AccessTokenEndpoint $endpoint)
    {
    }

    public function getShareToken(ShareTokenQuery $query): Item|AccessTokenResponse
    {
        $data = $this->endpoint->getShareToken($query)->toArray();

        return Hydrator::instance($data, ShareToken::class);
    }

    public function getAccessToken(AccessTokenQuery $query): Item|AccessTokenResponse
    {
        $data = $this->endpoint->getAccessToken($query)->toArray();

        return Hydrator::instance($data, AccessTokenResponse::class);
    }
}