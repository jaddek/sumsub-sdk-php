<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Provider;

use Jaddek\Sumsub\Http\Endpoint\AccessToken;
use Jaddek\Sumsub\Http\Query\AccessToken\AccessTokenQuery;
use Jaddek\Sumsub\Http\Query\AccessToken\ShareTokenQuery;

class AccessTokenProvider
{
    public function __construct(private AccessToken $endpoint)
    {
    }

    public function getShareToken(ShareTokenQuery $query): array
    {
        return $this->endpoint->getShareToken($query)->toArray();
    }

    public function getAccessToken(AccessTokenQuery $query): array
    {
        return $this->endpoint->getAccessToken($query)->toArray();
    }
}