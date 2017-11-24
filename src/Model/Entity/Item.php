<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $sub_category_id
 * @property string $product_title
 * @property string $product_image
 * @property string $product_desc
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\SubCategory $sub_category
 */
class Item extends Entity
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
        'sub_category_id' => true,
        'product_title' => true,
        'product_image' => true,
        'product_desc' => true,
		'sort_order' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true,
        'category' => true,
        'sub_category' => true
    ];
}
