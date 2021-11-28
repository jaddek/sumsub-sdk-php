<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Endpoint;

use Jaddek\Sumsub\Http\Query\AccessToken\AccessTokenQuery;
use Jaddek\Sumsub\Http\Query\AccessToken\ShareTokenQuery;
use Symfony\Contracts\HttpClient\ResponseInterface;

class AccessToken extends Endpoint implements AccessTokenInterface
{
    public function getShareToken(ShareTokenQuery $query): ResponseInterface
    {
        $url = strtr('/resources/accessTokens/-/shareToken?{query}', [
            '{query}' => $query->toArray(),
        ]);

        return $this->request('POST', $url);
    }

    public function getAccessToken(AccessTokenQuery $query): ResponseInterface
    {
        $url = strtr('/resources/accessTokens?{query}', [
            '{query}' => http_build_query($query->toArray())
        ]);

        return $this->request('POST', $url);
    }
}