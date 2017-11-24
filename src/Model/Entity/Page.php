<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Page Entity
 *
 * @property int $id
 * @property string $page_title
 * @property string $page_slug
 * @property string $page_header_image
 * @property string $selected_module
 * @property int $module_sort_order
 * @property string $meta_title
 * @property string $meta_descriptions
 * @property string $meta_keywords
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\PageSection[] $page_sections
 */
class Page extends Entity
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
        'page_title' => true,
        'page_slug' => true,
        'page_header_image' => true,
        'selected_module' => true,
		'module_id' => true,
        'module_sort_order' => true,
        'meta_title' => true,
        'meta_descriptions' => true,
        'meta_keywords' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true,
        'page_sections' => true
    ];
}
