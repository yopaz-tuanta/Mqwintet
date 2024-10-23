<?php
declare(strict_types=1);

use App\Utilities\UserRoleEnum;
use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('users');
        $table
            ->addColumn('email', 'string',[
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex('email', ['unique' => true])
            ->addColumn('first_name', 'string',[
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('last_name', 'string',[
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string',[
                'default' => null,
                'null' => false,
            ])
            ->addColumn('role', 'enum',[
                'values' => UserRoleEnum::getValues(),
                'default' => UserRoleEnum::USER,
                'null' => false,
            ])
            ->addColumn('created_at', 'timestamp',[
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('updated_at', 'timestamp',[
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('deleted_at', 'timestamp',[
                'default' => null,
                'null' => true,
            ])
            
            ->create();
    }
}
