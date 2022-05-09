<?php
declare(strict_types=1);

namespace App\Application\Authentication\service;

use App\Application\Authentication\command\CredentialsCommand;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

final class AuthenticationApplicationService
{
    /**
     * @var CredentialsCommand
     */
    private $credentialsCommand;

    /**
     * AuthenticationApplicationService constructor.
     * @param \App\Application\Authentication\command\CredentialsCommand $credentialsCommand
     */
    public function __construct(CredentialsCommand $credentialsCommand)
    {
        $this->credentialsCommand = $credentialsCommand;
    }

    /**
     * @return \App\Models\Employee $employee
     */
    public function handle(): ?Employee
    {
        $employee = Employee::findForPassport($this->credentialsCommand->email);
        if (empty($employee) || !$employee->validateForPassportPasswordGrant($this->credentialsCommand->pass)) {
            return null;
        }
        return $employee;
    }
}
