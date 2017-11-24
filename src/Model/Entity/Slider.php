<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slider Entity
 *
 * @property int $id
 * @property string $image_title
 * @property string $desktop_image
 * @property string $mobile_image
 * @property string $image_link
 * @property int $image_index
 * @property int $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 */
class Slider extends Entity
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
        'image_title' => true,
        'desktop_image' => true,
        'mobile_image' => true,
        'image_link' => true,
        'image_index' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true
    ];
}
