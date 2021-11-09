<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product_in_offer".
 *
 * @property int $id_offer
 * @property int $id_product
 * @property int $kol_in_offer
 *
 * @property Offer $offer
 * @property Product $product
 */
class ProductInOffer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_in_offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_offer', 'id_product', 'kol_in_offer'], 'required'],
            [['id_offer', 'id_product', 'kol_in_offer'], 'integer'],
            [['id_offer', 'id_product'], 'unique', 'targetAttribute' => ['id_offer', 'id_product']],
            [['id_offer'], 'exist', 'skipOnError' => true, 'targetClass' => Offer::className(), 'targetAttribute' => ['id_offer' => 'id_offer']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id_product']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_offer' => 'Id Offer',
            'id_product' => 'Id Product',
            'kol_in_offer' => 'Kol In Offer',
        ];
    }

    /**
     * Gets query for [[Offer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(Offer::className(), ['id_offer' => 'id_offer']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }
}
