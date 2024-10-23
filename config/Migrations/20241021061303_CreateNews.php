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
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('content', 'text', [
                'default' => null,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('updated', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('released', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('deleted', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->create();
    }
}
