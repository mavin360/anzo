<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageSection Entity
 *
 * @property int $id
 * @property int $page_id
 * @property string $section_title
 * @property string $section_text
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\Page $page
 */
class PageSection extends Entity
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
        'page_id' => true,
        'section_title' => true,
        'section_text' => true,
        'added_date' => true,
        'modify_date' => true,
        'page' => true
    ];
}
