<?php

namespace App\Http\Controllers\API;

use App\Application\Employee\service\EmployeeApplicationService;
use App\Application\Employee\request\EmployeeCreateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterEmployeeRequest;
use App\Infrastructure\Employee\EmployeeRepository;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmployeeAuthorController extends BaseController
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * SampleController constructor.
     */
    public function __construct()
    {
        $this->employeeRepository = new EmployeeRepository();
    }

    public function register(RegisterEmployeeRequest $request)
    {
        try {
            $employeeCreateRequest = EmployeeCreateRequest::fromRequest($request);
            $service = new EmployeeApplicationService(
                $this->employeeRepository
            );
    
            $data = $service->handle($employeeCreateRequest);
    
            return $this->sendResponse($data, "Employee created successful");
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(),);
        }
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'username' => 'email|required',
            'pass' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        $data['employee'] = auth()->user();
        $data['access_token'] = $accessToken;

        return response($data, "Login successful!");

    }
}
