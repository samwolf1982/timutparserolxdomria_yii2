<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property integer $id
 * @property integer $price
 * @property string $own_or_business
 * @property integer $square
 * @property string $district
 * @property string $street
 * @property string $description
 * @property string $shortdistrict
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
            [['price', 'square'], 'integer'],
            [['description', 'url', 'img'], 'string'],
            [['own_or_business', 'district', 'street', 'shortdistrict', 'manager', 'coment', 'site'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'own_or_business' => 'Own Or Business',
            'square' => 'Square',
            'district' => 'District',
            'street' => 'Street',
            'description' => 'Description',
            'shortdistrict' => 'Shortdistrict',
            'manager' => 'Manager',
            'coment' => 'Coment',
            'url' => 'Url',
            'site' => 'Site',
            'img' => 'Img',
        ];
    }
}
