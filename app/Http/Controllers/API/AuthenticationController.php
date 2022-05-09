<?php

namespace App\Http\Controllers\API;

use App\Application\Authentication\command\CredentialsCommand;
use App\Application\Authentication\service\AuthenticationApplicationService;
use App\Application\Authentication\service\CreateTokenApplicationService;
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

        $authenticationApplicationService = new AuthenticationApplicationService($command);
        $employee = $authenticationApplicationService->handle();
        if(empty($employee)) {
            return $this->sendError('Invalid Credentials',[], Response::HTTP_BAD_REQUEST);
        }

        $createTokenApplicationService = new CreateTokenApplicationService($employee);
        $data = $createTokenApplicationService->handle();

        return $this->sendResponse($data, "Login successful!");
    }
}
