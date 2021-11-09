<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id_product
 * @property string $name
 * @property float $price
 * @property int $kol_in_storage
 * @property string|null $picture
 * @property string|null $description
 *
 * @property ProductInOffer[] $productInOffers
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'kol_in_storage'], 'required'],
            [['price'], 'number'],
            [['kol_in_storage'], 'integer'],
            [['description'], 'string'],
            [['name', 'picture'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'name' => 'Name',
            'price' => 'Price',
            'kol_in_storage' => 'Kol In Storage',
            'picture' => 'Picture',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[ProductInOffers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductInOffers()
    {
        return $this->hasMany(ProductInOffer::className(), ['id_product' => 'id_product']);
    }
}
