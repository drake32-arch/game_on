<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
<title>Game_ON </title>
<meta charset="<?= Yii::$app->charset ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
	<div class="clear"></div>
     <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<?php
    NavBar::begin([
    //  'brandLabel' => '<img src="/images/logo.png" style="display:inline; vertical-align: top; height:500%;">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-static-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'nav nav-tabs nav-justified'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/admin/default/index']],
			['label' => 'Заказы', 'url' => ['/admin/offer/index']],
            ['label' => 'Товары', 'url' => ['/admin/product/index']],
			['label' => 'Товары в заказе', 'url' => ['/admin/product_in_offer/index']],
            ['label' => 'Покупатели', 'url' => ['/admin/buyer/index']],
			Yii::$app->user->isGuest ? (
                ['label' => 'Вход', 'url' => ['/admin/default']]
                ) : (
                    '<li>'                
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выход (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
			
			//http://basic/web/admin/default/index

           
        ],
    ]);
	?>

<div class="clear"></div>
<?php
    NavBar::end();
    ?>


	<div class="header">


  		</div>     
			
						<!------End Slider ------------>
			      
		
   </div>
   <!------------End Header ------------>
  <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
		
    </div>

   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Privacy Policy</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="#">Track My Order</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
					
        </div>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

