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
                'null' => false,
            ])
            ->addColumn('title', 'string', [
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('thumbnail_url', 'text', [
                'null' => false,
            ])
            ->addColumn('video_url', 'text', [
                'null' => false,
            ])
            ->addColumn('sort_order', 'integer', [
                'null' => false,
            ])
            ->addColumn('created', 'timestamp', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'timestamp', [
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
