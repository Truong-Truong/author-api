<?php

namespace App\Http\Controllers\API;

use App\Application\Authentication\CredentialsCommand;
use App\Domain\service\Authentication\AuthenticationService;
use App\Domain\service\Authentication\CreateTokenService;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Response;

class AuthenticationController extends BaseController
{
    /**
     * AuthenticationController constructor.
     */
    public function __construct() {}

    /**
     * login.
     * @param \App\Http\Requests\LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $command = CredentialsCommand::fromRequest($request);

        $authenticationService = new AuthenticationService($command);
        $employee = $authenticationService->handle();
        if(empty($employee)) {
            return $this->sendError('Invalid Credentials',[], Response::HTTP_BAD_REQUEST);
        }

        $createTokenService = new CreateTokenService($employee);
        $data = $createTokenService->handle();

        return $this->sendResponse($data, "Login successful!");
    }
}
