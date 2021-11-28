<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Query\AccessToken;

use Jaddek\Sumsub\Http\Query\Query;

class ShareTokenQuery extends Query
{
    public function __construct(
        protected string $applicantId,
        protected string $clientId,
    )
    {

    }
}