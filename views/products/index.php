<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Товар';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="main">
   	 <div class="wrap">
  
        <?php if (!empty($product)) : ?>
            <?php foreach ($product as $pr):  ?>
   	 	<div class="section group">
        
                	
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">	
               		
					<div class="grid images_3_of_2">
                    <a href="<?= URL::to("@web/site/about")?>"><?= HTML::img("@web/images/{$pr->picture}")?></a>
				  </div>
				<div class="desc span_3_of_2">
					<h2><?=$pr->name?></h2>
					<div class="price">
						<p>Цена: <span><?=$pr->price?>р.</span></p>
					</div>
					<div class="available">
						<ul>
						 
						  <li><span>Осталось на складе:</span>&nbsp; <?=$pr->kol_in_storage?></li>
					    </ul>
					</div>
				<div class="share-desc">
					<div class="button"><span><a href="#">В корзину</a></span></div>					
					<div class="clear"></div>
				</div>
				
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			 <h2>Описание :</h2>
             <p><?=$pr->description?></p>
	   </div>
       <?php endforeach?>
       <?php endif;?>
   </div>
			
</div>


