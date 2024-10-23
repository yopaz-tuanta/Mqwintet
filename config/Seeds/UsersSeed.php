<?php

declare(strict_types=1);

use Cake\Utility\Hash;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'tuanchibi1411@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tuan',
                'password' => '123456',
                'role' => 'admin',
            ],
            [
                'email' => 'tuchibi1511@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tu',
                'password' => '123456',
            ],
        ];

        $table = $this->table('users');
        
        $table->insert($data)->save();
    }
}
