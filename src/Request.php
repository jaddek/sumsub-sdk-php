<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http;

abstract class Request implements \JsonSerializable
{
    use JsonTrait;
}