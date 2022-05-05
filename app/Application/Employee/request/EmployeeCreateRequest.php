<?php
declare(strict_types=1);

namespace App\Application\Employee\request;

use App\Http\Requests\RegisterEmployeeRequest;

final class EmployeeCreateRequest
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $email;

    /**
     * EmployeeCreateRequest constructor.
     */
    public function __construct(){}


    /**
     * EmployeeCreateRequest constructor
     * @param \App\Http\Requests\RegisterEmployeeRequest $equest.
     */
    public static function fromRequest(RegisterEmployeeRequest $request) {
        $instance = new self();
        $instance->name = data_get($request, 'name');
        $instance->username = data_get($request, 'username');
        $instance->pass = bcrypt(data_get($request, 'pass'));
        $instance->email = data_get($request, 'email');
        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $array = [];
        foreach($this as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }
}
