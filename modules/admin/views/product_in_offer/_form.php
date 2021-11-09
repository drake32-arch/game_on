<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProductInOffer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-in-offer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_offer')->textInput() ?>

    <?= $form->field($model, 'id_product')->textInput() ?>

    <?= $form->field($model, 'kol_in_offer')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
