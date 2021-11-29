<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Response\AccessToken;

use Jaddek\Hydrator\Item;

class ShareToken extends Item
{
    public function __construct(
        protected string $token,
        protected string $forClientId,
    )
    {
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getForClientId(): string
    {
        return $this->forClientId;
    }
}
