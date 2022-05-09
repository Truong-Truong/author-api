<?php
declare(strict_types=1);

namespace App\Application\Authentication\command;

use App\Application\share\BaseCommand;
use App\Http\Requests\LoginRequest;

final class CredentialsCommand extends BaseCommand
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $pass;

    /**
     * CredentialsCommand constructor.
     */
    public function __construct(string $email, string $pass)
    {
        $this->email = $email;
        $this->pass = $pass;
    }

    /**
     * CredentialsCommand constructor
     * @param \App\Http\Requests\LoginRequest $equest.
     */
    public static function fromRequest(LoginRequest $request) {
        return new self(
            data_get($request, 'email'),
            data_get($request, 'pass')
        );
    }
}
