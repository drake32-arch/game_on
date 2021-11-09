<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<div class="main">
<?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
<div class="admin-default-index">
    <h1>База данных - торговой организации</h1>
   </br><br>
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " href="offer">заказы</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="product">товары</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="buyer">Покупатели</a>
  </li>
  
</ul>
</div>
</div>