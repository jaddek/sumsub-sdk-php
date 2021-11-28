<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Endpoint;

use Jaddek\Sumsub\Http\Query\AccessToken\AccessTokenQuery;
use Jaddek\Sumsub\Http\Query\AccessToken\ShareTokenQuery;
use Symfony\Contracts\HttpClient\ResponseInterface;

interface AccessTokenInterface
{
    public function getShareToken(ShareTokenQuery $query): ResponseInterface;

    public function getAccessToken(AccessTokenQuery $query): ResponseInterface;
}
