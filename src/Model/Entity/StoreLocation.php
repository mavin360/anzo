<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StoreLocation Entity
 *
 * @property int $id
 * @property string $store_title
 * @property string $store_city
 * @property string $store_address
 * @property string $store_image
 * @property string $store_lat
 * @property string $store_lon
 * @property string $store_phone
 * @property string $store_open_days
 * @property string $store_open_time
 * @property string $status
 * @property \Cake\I18n\FrozenTime $added_date
 * @property \Cake\I18n\FrozenTime $modify_date
 */
class StoreLocation extends Entity
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
        'store_title' => true,
		 'store_country' => true,
        'store_city' => true,
        'store_address' => true,
        'store_image' => true,
		'store_pin' => true,
        'store_lat' => true,
        'store_lon' => true,
        'store_phone' => true,
        'store_open_days_from' => true,
		'store_open_days_to' => true,
        'store_open_time_from' => true,
		'store_open_time_to' => true,
        'status' => true,
		'store_location_days_times' => true,
        'added_date' => true,
        'modify_date' => true
    ];
}
