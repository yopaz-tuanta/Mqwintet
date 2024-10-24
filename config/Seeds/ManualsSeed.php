<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Manuals seed.
 */
class ManualsSeed extends AbstractSeed
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
                'title' => 'Huong dan sua xe oto',
                'description' => 'Mo ta huong dan sua xe oto',
            ],
            [
                'title' => 'Huong dan sua xe may',
                'description' => 'Mo ta huong dan sua xe may',
            ],
        ];

        $table = $this->table('manuals');
        
        $table->insert($data)->save();
    }
}
