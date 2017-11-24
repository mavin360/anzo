<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $category_title
 * @property string $category_desc
 * @property string $category_image
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 */
class Category extends Entity
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
        'category_title' => true,
        'category_desc' => true,
        'category_image' => true,
		'sort_order' => true,
		'show_no' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true
    ];
}
