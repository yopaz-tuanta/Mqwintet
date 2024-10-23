<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * News seed.
 */
class NewsSeed extends AbstractSeed
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
                'title' => 'Thong bao ky thi sua xe o to',
                'content' => 'Ngay thi 14/11',
            ],
            [
                'title' => 'Thong bao ky thi sua xe may',
                'content' => 'Ngay thi 15/11',
            ]
        ];

        $table = $this->table('news');
        
        $table->insert($data)->save();
    }
}
