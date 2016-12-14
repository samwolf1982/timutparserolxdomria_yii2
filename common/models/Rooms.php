<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rooms".
 *
 * @property integer $id
 * @property string $shortdistrict
 * @property string $phone
 * @property integer $price
 * @property string $currency
 * @property integer $price_m
 * @property integer $count_rooms
 * @property integer $square
 * @property integer $floor
 * @property integer $floors
 * @property string $type
 * @property string $district
 * @property string $street
 * @property string $description
 * @property string $state
 * @property string $own_or_business
 * @property string $manager
 * @property string $coment
 * @property string $url
 * @property string $site
 * @property string $img
 * @property string $date
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
            [['price', 'price_m', 'count_rooms', 'square', 'floor', 'floors'], 'integer'],
            [['description', 'url', 'img','date'], 'string'],
            [['shortdistrict', 'phone', 'currency', 'type', 'district', 'street', 'state', 'own_or_business', 'manager', 'coment', 'site'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shortdistrict' => 'Краткое опис.',
            'phone' => 'Телефон',
            'price' => 'Цена',
            'currency' => 'Валюта',
            'price_m' => 'Цена м2',
            'count_rooms' => 'Кол. комнат',
            'square' => 'Площадь',
            'floor' => 'Этаж',
            'floors' => 'Этажность',
            'type' => 'Тип',
            'district' => 'Район',
            'street' => 'Улица',
            'description' => 'Описание',
            'state' => 'Состояние',
            'own_or_business' => 'Форма',
            'manager' => 'Менеджер',
            'coment' => 'Коментарий',
            'url' => 'Урл',
            'site' => 'Сайт',
            'img' => 'КартинкиJSON',
            'date' => 'Дата',
        ];
    }
}
