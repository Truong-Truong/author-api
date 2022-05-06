<?php
declare(strict_types=1);

namespace App\Application\Employee;

use App\Application\share\BaseCommand;
use App\Http\Requests\RegisterEmployeeRequest;

final class EmployeeCreateCommand extends BaseCommand
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $pass;

    /**
     * @var string
     */
    public $email;

    /**
     * EmployeeCreateCommand constructor.
     */
    public function __construct(string $name, string $username, string $pass, string $email)
    {
        $this->name = $name;
        $this->username = $username;
        $this->pass = $pass;
        $this->email = $email;
    }

    /**
     * EmployeeCreateCommand constructor
     * @param \App\Http\Requests\RegisterEmployeeRequest $equest.
     */
    public static function fromRequest(RegisterEmployeeRequest $request) {
        return new self(
            data_get($request, 'name'),
            data_get($request, 'username'),
            data_get($request, 'pass'),
            data_get($request, 'email')
        );
    }
}
