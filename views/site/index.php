<?php
use yii\helpers\Html;
use coderius\swiperslider\SwiperSlider;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="clear"></div>
<?php

echo \coderius\swiperslider\SwiperSlider::widget([
    'showScrollbar' => false,
	'showPagination' => false,
    'slides' => [
        '<img src= "/images/1.jpg">',
		'<img src= "/images/3.jpg">',
		'<img src= "/images/4.jpg">',
    ],

    'clientOptions' => [
        'slidesPerView' => 1,
        'spaceBetween'=> 30,
        'centeredSlides'=> true,
    ],

    //Global styles to elements. If create styles for all slides
    'options' => [
        'styles' => [
            \coderius\swiperslider\SwiperSlider::CONTAINER => ["height" => "auto"],
            \coderius\swiperslider\SwiperSlider::SLIDE => ["text-align" => "center"],
        ],
    ],
        
]);

?>


  
<div class="main">
  	<div class="wrap">
      <div class="content">
		<div class="header">
			<div class="content_top">
				<div class="header_top_right">
					<div class="search_box">
						<form method="get" action="<?= Url::to(['/site/index']) ?>">
							<input type="text" name="q" value="" ><input type="submit"  value="">
						</form>
					</div>
				</div>
			</div>
		</div>
        <?php if (!empty($product)) :
			 if (!empty($q)):
			?>
			<div class="heading">
    		<h3>Товары по запросу: <?=$q?> </h3>
    		</div>
			</div>
			<?php endif;?>
	      <div class="section group">
          <?php foreach ($product as $pr):  ?>
				<div class="grid_1_of_5 images_1_of_5">
					 <a href="<?= URL::to(['/products/index', 'id' => $pr->id_product])?>"><?= HTML::img("@web/images/{$pr->picture}")?></a>
					 <h2><a href="<?= URL::to(['/products/index', 'id' => $pr->id_product])?>"><?=$pr->name?></a></h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees"><?=$pr->price?>р.</span></p>
					    </div>
					       		<div class="add-cart">								
									<h4><a href="<?= URL::to(['/cart/add', 'id' => $pr->id_product])?>"> В корзину</a></h4>
							     </div>							
					</div>		
                     <div class="clear"></div>			 
				</div>
                <?php endforeach?>
			</div>
		<?php endif;?>
        </div>	
    </div>
</div>

