<?php

declare(strict_types=1);

namespace Jaddek\Sumsub\Http\Response\AccessToken;

use Jaddek\Hydrator\Item;

class AccessToken extends Item
{
    public function __construct(
        protected string $token,
        protected string $userId,
    ) {

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
    public function getUserId(): string
    {
        return $this->userId;
    }
}