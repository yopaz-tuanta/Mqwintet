<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateManuals extends AbstractMigration
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
        $table = $this->table('manuals');
        $table
            ->addColumn('title', 'string', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('desc', 'text', [
                'default' => null,
            ])
            ->addColumn('created_at', 'timestamp',[
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('updated_at', 'timestamp',[
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->create();
    }
}
