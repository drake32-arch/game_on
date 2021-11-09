<?php
namespace app\controllers;

use app\models\Buyer;
use app\models\Offer;
use app\models\ProductInOffer;
use app\models\Product;

class OfferController extends AppController {
    public $defaultAction = 'checkout';

    public function actionCheckout() {
        
        $offer = new Offer();
        $buyer = new Buyer();
        $product_in_offer = new ProductInOffer();


        

        return $this->render('checkout', compact('offer','buyer','product_in_offer'));
    }
    public function actionOkAccept() {
        $id = Yii::$app->request->get('id');
        if(!empty($id)){
            echo('Ваш заказ Успешно дабвален');
        }
        return $this->render('checkout', compact('offer','buyer','product_in_offer'));
    }


}