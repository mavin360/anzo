<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobCategory Entity
 *
 * @property int $id
 * @property string $cat_name
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\Job[] $jobs
 */
class JobCategory extends Entity
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
        'cat_name' => true,
        'added_date' => true,
        'modify_date' => true,
        'jobs' => true
    ];
}
