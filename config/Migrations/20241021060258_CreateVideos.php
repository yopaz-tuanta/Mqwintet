<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVideos extends AbstractMigration
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
        $table = $this->table('videos');
        $table
            ->addColumn('manual_id', 'integer', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('desc', 'text', [
                'default' => null,
            ])
            ->addColumn('thumbnail_url', 'string', [
                'default' => null,
            ])
            ->addColumn('video_url', 'string', [
                'default' => null,
            ])
            ->addColumn('sort_order', 'integer', [
                'default' => null,
                'null' => false,
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
