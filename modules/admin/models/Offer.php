<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "offer".
 *
 * @property int $id_offer
 * @property int $id_buyer
 * @property string $date
 * @property int $offer_check
 * @property float $total_cost
 *
 * @property Buyer $buyer
 * @property ProductInOffer[] $productInOffers
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buyer', 'date', 'offer_check', 'total_cost'], 'required'],
            [['id_buyer', 'offer_check'], 'integer'],
            [['date'], 'safe'],
            [['total_cost'], 'number'],
            [['id_buyer'], 'exist', 'skipOnError' => true, 'targetClass' => Buyer::className(), 'targetAttribute' => ['id_buyer' => 'id_buyer']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_offer' => 'Id Offer',
            'id_buyer' => 'Id Buyer',
            'date' => 'Date',
            'offer_check' => 'Offer Check',
            'total_cost' => 'Total Cost',
        ];
    }

    /**
     * Gets query for [[Buyer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyer()
    {
        return $this->hasOne(Buyer::className(), ['id_buyer' => 'id_buyer']);
    }

    /**
     * Gets query for [[ProductInOffers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductInOffers()
    {
        return $this->hasMany(ProductInOffer::className(), ['id_offer' => 'id_offer']);
    }
}
