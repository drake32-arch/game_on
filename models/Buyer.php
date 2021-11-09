<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buyer".
 *
 * @property int $id_buyer
 * @property string $f_name
 * @property string $s_name
 * @property string $th_name
 * @property string $address
 * @property string $email
 * @property string $m_phone
 *
 * @property Offer[] $offers
 */
class Buyer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buyer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['f_name', 's_name', 'address', 'email', 'm_phone'], 'required'],
            [['f_name', 's_name', 'th_name', 'address', 'email'], 'string', 'max' => 50],
            [['m_phone'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_buyer' => 'Id Buyer',
            'f_name' => 'Имя',
            's_name' => 'Фамилия',
            'th_name' => 'Отчество',
            'address' => 'Адрес доставки',
            'email' => 'Email',
            'm_phone' => 'Телефон',
        ];
    }

    /**
     * Gets query for [[Offers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['id_buyer' => 'id_buyer']);
    }
}
