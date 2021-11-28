<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Query\AccessToken;

use Jaddek\Sumsub\Http\Query\Query;

class AccessTokenQuery extends Query
{
    public function __construct(
        protected string $userId,
        protected string $levelName,
    )
    {

    }
}