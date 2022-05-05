<?php
declare(strict_types=1);

namespace App\Application\Employee\service;

use App\Application\Employee\request\EmployeeCreateRequest;
use App\Application\Employee\response\EmployeeCreateResponse;
use App\Infrastructure\Employee\EmployeeRepository;

final class EmployeeApplicationService
{
    /**
     * @var EmployeeRepository
     */
    private $employeeRepository;

    /**
     * EmployeeApplicationService constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @param EmployeeCreateRequest $employeeCreateRequest
     * @return \App\Application\Employee\response\EmployeeCreateResponse $employeeCreateResponse
     */
    public function handle(EmployeeCreateRequest $employeeCreateRequest): EmployeeCreateResponse
    {
        $employee = $this->employeeRepository->register($employeeCreateRequest);
        $accessToken = $employee->createToken('authToken')->accessToken;
        return new EmployeeCreateResponse(
            $employee,
            $accessToken
        );
    }
}
