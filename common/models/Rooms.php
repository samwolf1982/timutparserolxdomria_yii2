<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property integer $id
 * @property string $shortdistrict
 * @property integer $price
 * @property string $currency
 * @property integer $count_rooms
 * @property integer $square
 * @property integer $floor
 * @property integer $floors
 * @property string $type
 * @property string $district
 * @property string $street
 * @property string $description
 * @property string $own_or_business
 * @property string $manager
 * @property string $coment
 * @property string $url
 * @property string $site
 * @property string $img
 */
class Rooms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rooms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'count_rooms', 'square', 'floor', 'floors'], 'integer'],
            [['description', 'url', 'img'], 'string'],
            [['shortdistrict', 'currency', 'type', 'district', 'street', 'own_or_business', 'manager', 'coment', 'site'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortdistrict' => 'Shortdistrict',
            'price' => 'Price',
            'currency' => 'Currency',
            'count_rooms' => 'Count Rooms',
            'square' => 'Square',
            'floor' => 'Floor',
            'floors' => 'Floors',
            'type' => 'Type',
            'district' => 'District',
            'street' => 'Street',
            'description' => 'Description',
            'own_or_business' => 'Own Or Business',
            'manager' => 'Manager',
            'coment' => 'Coment',
            'url' => 'Url',
            'site' => 'Site',
            'img' => 'Img',
        ];
    }
}
