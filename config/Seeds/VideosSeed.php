<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Videos seed.
 */
class VideosSeed extends AbstractSeed
{
    const VIDEO_URL = 'abc.xyz';
    const THUMBNAIL_URL = 'abc.img';

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
                'manual_id' => 1,
                'title' => 'Video sua xe oto con',
                'description' => 'Video sua xe oto chi tiet',
                'thumbnail_url' => self::THUMBNAIL_URL,
                'sort_order' => 1,
                'video_url' => self::VIDEO_URL,
            ],

            [
                'manual_id' => 1,
                'title' => 'Video sua xe oto tai',
                'description' => 'Video sua xe oto chi tiet',
                'thumbnail_url' => self::THUMBNAIL_URL,
                'sort_order' => 2,
                'video_url' => self::VIDEO_URL,
            ],

            [
                'manual_id' => 2,
                'title' => 'Video sua xe may SH',
                'description' => 'Video sua xe may chi tiet',
                'thumbnail_url' => self::THUMBNAIL_URL,
                'sort_order' => 1,
                'video_url' => self::VIDEO_URL,
            ]
        ];

        $table = $this->table('videos');
       
        $table->insert($data)->save();
    }
}
