<?php
declare(strict_types=1);

namespace App\Application\Employee;

use App\Models\Employee;

final class EmployeeCreateResult
{
    /**
     * @var Employee
     */
    public $employee;

    /**
     * @var string
     */
    public $access_token;

    /**
     * EmployeeCreateResult constructor.
     * 
     * @param \App\Models\Employee $employee
     * @param string $accessToken
     */
    public function __construct(Employee $employee, string $accessToken){
        $this->employee = $employee;
        $this->access_token = $accessToken;
    }
}
