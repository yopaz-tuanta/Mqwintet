<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Video Entity
 *
 * @property int $id
 * @property int $manual_id
 * @property string $title
 * @property string $desc
 * @property string $thumbnail_url
 * @property string $video_url
 * @property int $sort_order
 * @property \Cake\I18n\DateTime $created_at
 * @property \Cake\I18n\DateTime $updated_at
 * @property \Cake\I18n\DateTime $released_at
 * @property \Cake\I18n\DateTime|null $deleted_at
 *
 * @property \App\Model\Entity\Manual $manual
 */
class Video extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'manual_id' => true,
        'title' => true,
        'desc' => true,
        'thumbnail_url' => true,
        'video_url' => true,
        'sort_order' => true,
        'created_at' => false,
        'updated_at' => false,
        'released_at' => false,
        'deleted_at' => true,
    ];
}
