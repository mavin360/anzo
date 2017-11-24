<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GalleryImage Entity
 *
 * @property int $id
 * @property int $gallery_id
 * @property string $image
 * @property string $image_title
 * @property string $image_desc
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\Gallery $gallery
 */
class GalleryImage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'gallery_id' => true,
        'image' => true,
        'image_title' => true,
        'image_desc' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true,
        'gallery' => true
    ];
}
