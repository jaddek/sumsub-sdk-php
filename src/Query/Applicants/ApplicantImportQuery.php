<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Query\Transactions;

use Jaddek\Sumsub\Http\Query\Query;

class ApplicantImportQuery extends Query
{
    public function __construct(
        protected string $shareToken,
        protected string $trustReview,
    )
    {
    }
}