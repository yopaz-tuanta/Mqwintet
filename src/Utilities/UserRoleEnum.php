<?php

namespace App\Utilities;

class UserRoleEnum
{
    const ADMIN = 'admin';
    const USER = 'user';

    public static function getValues(): array
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }
}
