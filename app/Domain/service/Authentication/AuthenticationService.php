<?php
declare(strict_types=1);

namespace App\Domain\service\Authentication;

use App\Application\Authentication\CredentialsCommand;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

final class AuthenticationService
{
    /**
     * @var CredentialsCommand
     */
    private $credentialsCommand;

    /**
     * AuthenticationService constructor.
     * @param \App\Application\Authentication\CredentialsCommand $credentialsCommand
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
