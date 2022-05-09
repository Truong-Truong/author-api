<?php
declare(strict_types=1);

namespace App\Application\Authentication\result;

final class TokenResult
{
    /**
     * @var string
     */
    public $access_token;

    /**
     * TokenResult constructor.
     * 
     * @param string $accessToken
     */
    public function __construct(string $accessToken){
        $this->access_token = $accessToken;
    }
}

