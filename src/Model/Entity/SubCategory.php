<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubCategory Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $sub_category_title
 * @property string $sub_category_desc
 * @property string $sub_category_image
 * @property string $layout_style
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\Category $category
 */
class SubCategory extends Entity
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
        'category_id' => true,
        'sub_category_title' => true,
        'sub_category_desc' => true,
        'sub_category_image' => true,
        'layout_style' => true,
        'layout_col' => true,
		'show_no' => true,
		'sort_order' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true,
        'category' => true
    ];
}
