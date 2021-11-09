<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BuyerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buyers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buyer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Buyer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'options' => [
            'class' => 'table-responsive',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        

            'id_buyer',
            'f_name',
            's_name',
            'th_name',
            'address',
            //'email:email',
            //'m_phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
