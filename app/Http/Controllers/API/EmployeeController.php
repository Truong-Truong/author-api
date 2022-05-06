<?php

namespace App\Http\Controllers\API;

use App\Application\Employee\EmployeeCreateCommand;
use App\Domain\service\Employee\EmployeeApplicationService;
use App\Http\Requests\RegisterEmployeeRequest;
use App\Infrastructure\Employee\EmployeeRepository;

class EmployeeController extends BaseController
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

    /**
     * register.
     *  @param \App\Http\Requests\RegisterEmployeeRequest $request
     */
    public function register(RegisterEmployeeRequest $request)
    {
        try {
            $employeeCreateCommand = EmployeeCreateCommand::fromRequest($request);
            $service = new EmployeeApplicationService(
                $this->employeeRepository
            );
    
            $data = $service->handle($employeeCreateCommand);
    
            return $this->sendResponse($data, "Employee created successfully");

        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
