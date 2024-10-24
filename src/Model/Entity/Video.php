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
 * @property string|null $description
 * @property string $thumbnail_url
 * @property string $video_url
 * @property int $sort_order
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property \Cake\I18n\DateTime|null $released
 * @property \Cake\I18n\DateTime|null $deleted
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
        'title' => true,
        'description' => true,
        'thumbnail_url' => true,
        'video_url' => true,
        'sort_order' => true,
        'released' => true,
        'deleted' => true,
    ];
}
