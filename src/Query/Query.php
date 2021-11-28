<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Query;

abstract class Query
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }
}