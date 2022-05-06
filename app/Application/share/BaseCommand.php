<?php
declare(strict_types=1);

namespace App\Application\share;

class BaseCommand
{
    /**
     * BaseCommand constructor.
     */
    public function __construct() {}

    /**
     * class to array for public property
     * @return array
     */
    public function toArray(): array
    {
        return call_user_func('get_object_vars', $this);
    }
}
