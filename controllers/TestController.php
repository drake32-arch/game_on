<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use app\models\Product;
use app\models\Offer;
use app\models\ProductInOffer;

class TestController extends AppController{
    
    public function actionIndex()
    {
        $csrf_param = Yii::$app->request->post('idp');
        //$id = Yii::$app->request->post('idp');
        debug($csrf_param);
       
    }
}