<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductInOffer */

$this->title = 'Update Product In Offer: ' . $model->id_offer;
$this->params['breadcrumbs'][] = ['label' => 'Product In Offers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_offer, 'url' => ['view', 'id_offer' => $model->id_offer, 'id_product' => $model->id_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-in-offer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
