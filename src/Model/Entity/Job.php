<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $job_category_id
 * @property string $job_title
 * @property string $job_type
 * @property string $job_state
 * @property string $job_city
 * @property string $job_description
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 *
 * @property \App\Model\Entity\JobCategory $job_category
 */
class Job extends Entity
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
        'job_category_id' => true,
        'job_title' => true,
        'job_type' => true,
        'job_state' => true,
        'job_city' => true,
        'job_description' => true,
        'status' => true,
        'added_date' => true,
        'modify_date' => true,
        'job_category' => true
    ];
}
