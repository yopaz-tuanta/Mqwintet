<?php

declare(strict_types=1);

use Cake\Utility\Hash;
use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

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
                'password' => $this->_setPassword('123456'),
                'role' => 'admin',
            ],
            [
                'email' => 'tuchibi1511@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tu',
                'password' => $this->_setPassword('123456'),
            ],
            [
                'email' => 'tuchibi1512@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tu1',
                'password' => $this->_setPassword('123456'),
            ],
            [
                'email' => 'tuchibi1513@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tu3',
                'password' => $this->_setPassword('123456'),
            ],
            [
                'email' => 'tuchibi1514@gmail.com',
                'first_name' => 'Truong',
                'last_name' => 'Anh Tu4',
                'password' => $this->_setPassword('123456'),
            ],
        ];

        $table = $this->table('users');
        
        $table->insert($data)->save();
    }

    // Add this method
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        return null;
    }
}
