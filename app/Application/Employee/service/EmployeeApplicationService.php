<?php
declare(strict_types=1);

namespace App\Application\Employee\service;

use App\Application\Employee\command\EmployeeCreateCommand;
use App\Application\Employee\result\EmployeeCreateResult;
use App\Application\Authentication\service\CreateTokenApplicationService;
use App\Domain\Employee\Employee as EmployeeDomain;
use App\Infrastructure\Employee\EmployeeRepository;
use Illuminate\Support\Facades\Hash;

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
     * @param \App\Application\Employee\command\EmployeeCreateCommand $employeeCreateCommand
     * @return \App\Application\Employee\result\EmployeeCreateResult $employeeCreateResult
     */
    public function handle(EmployeeCreateCommand $employeeCreateCommand): EmployeeCreateResult
    {
        $employeeDomain = EmployeeDomain::fromEmployeeCreateCommand($employeeCreateCommand);
        $employeeDomain->setPass(Hash::make($employeeDomain->getPass()));
        $employee = $this->employeeRepository->register($employeeDomain);
        $createTokenApplicationService = new CreateTokenApplicationService($employee);
        return $createTokenApplicationService->handle();
    }
}
