<?php

namespace Jaddek\Sumsub\Http;

class FactorySandbox extends Factory
{
    protected static function getHost(): string
    {
        return Sumsub::HOST_API_SANDBOX;
    }
}