<?php
declare(strict_types=1);

namespace App\Domain\service\Employee;

use App\Application\Employee\EmployeeCreateCommand;
use App\Application\Employee\EmployeeCreateResult;
use App\Domain\service\Authentication\CreateTokenService;
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
     * @param EmployeeCreateCommand $employeeCreateCommand
     * @return \App\Application\Employee\EmployeeCreateResult $employeeCreateResult
     */
    public function handle(EmployeeCreateCommand $employeeCreateCommand): EmployeeCreateResult
    {
        $employeeCreateCommand->pass = Hash::make($employeeCreateCommand->pass);
        $employee = $this->employeeRepository->register($employeeCreateCommand);
        $createTokenService = new CreateTokenService($employee);
        return $createTokenService->handle();
    }
}
