<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Buyer */

$this->title = 'Update Buyer: ' . $model->id_buyer;
$this->params['breadcrumbs'][] = ['label' => 'Buyers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_buyer, 'url' => ['view', 'id' => $model->id_buyer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buyer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
