<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateNews extends AbstractMigration
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
        $table = $this->table('news');
        $table
            ->addColumn('title', 'string', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('released_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('deleted_at', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->create();
    }
}
