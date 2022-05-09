<?php
declare(strict_types=1);

namespace App\Domain\Employee;

use App\Application\Employee\command\EmployeeCreateCommand;

final class Employee
{
    /**
     * @var string
     */
    private $id;

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
     * Employee constructor.
     */
    public function __construct(?string $id, string $name, string $username, string $pass, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->pass = $pass;
        $this->email = $email;
    }

    /**
     * get id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * set id
     * @param string $id
     */
    public function setId(string $id) {
        $this->id = $id;
    }

    /**
     * get name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * set name
     * @param string $name
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * get username
     */
    public function getUserName() {
        return $this->username;
    }

    /**
     * set username
     * @param string $username
     */
    public function setUserName(string $username) {
        $this->username = $username;
    }

    /**
     * get pass
     */
    public function getPass() {
        return $this->pass;
    }

    /**
     * set pass
     * @param string $pass
     */
    public function setPass(string $pass) {
        $this->pass = $pass;
    }

    /**
     * get email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * set email
     * @param string $email
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * Employee constructor from EmployeeCreateCommand
     * @param \App\Application\Employee\command\EmployeeCreateCommand $command.
     */
    public static function fromEmployeeCreateCommand(EmployeeCreateCommand $command) {
        return new self(
            data_get($command, 'id'),
            data_get($command, 'name'),
            data_get($command, 'username'),
            data_get($command, 'pass'),
            data_get($command, 'email')
        );
    }

    /**
     * Employee object to Employee array
     * @return array
     */
    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }
}
