<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setting Entity
 *
 * @property int $id
 * @property string $help_phone
 * @property string $help_phone_1
 * @property string $help_email
 * @property string $fb_url
 * @property string $twitter_url
 * @property string $instagram_url
 * @property string $linkedin_url
 * @property string $app_url
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 */
class Setting extends Entity
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
        'help_phone' => true,
        'help_phone_1' => true,
        'help_email' => true,
        'fb_url' => true,
        'twitter_url' => true,
        'instagram_url' => true,
        'linkedin_url' => true,
        'app_url' => true,
		'order_online_url' => true,
        'added_date' => true,
        'modify_date' => true
    ];
}
