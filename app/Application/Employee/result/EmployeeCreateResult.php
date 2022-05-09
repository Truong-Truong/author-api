<?php
declare(strict_types=1);

namespace App\Application\Employee\result;

use App\Application\Authentication\result\TokenResult;
use App\Models\Employee;

final class EmployeeCreateResult
{
    /**
     * @var Employee
     */
    public $employee;

    /**
     * @var TokenResult
     */
    public $access_token;

    /**
     * EmployeeCreateResult constructor.
     * 
     * @param \App\Models\Employee $employee
     * @param \App\Application\Authentication\result\TokenResult $accessToken
     */
    public function __construct(Employee $employee, TokenResult $accessToken){
        $this->employee = $employee;
        $this->access_token = $accessToken;
    }
}
