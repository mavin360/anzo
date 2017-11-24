<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity
 *
 * @property int $id
 * @property string $image
 * @property string $image_title
 * @property string $image_desc
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 */
class Gallery extends Entity
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
        'id' => true,
        'gallery_name' => true,
        'gallery_option' => true,
		'is_home' => true,
        'gallery_desc' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true
    ];
}
