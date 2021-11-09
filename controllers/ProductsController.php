<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\Offer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

class ProductsController extends AppController
{
    public function actionIndex()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::find()->where(['id_product' => $id])->all();
       // $titlename = $product->name;
     if(empty($product))
     throw new \yii\web\HttpException(404, 'Такого товара нет');
    return $this->render('index', compact('product'));
    }


}