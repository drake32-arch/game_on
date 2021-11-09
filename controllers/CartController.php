<?php
namespace app\controllers;

use Yii;
use yii\helpers\Html;
use yii\web\Controller;
use app\models\Product;
use app\models\Offer;
use app\models\ProductInOffer;

class CartController extends AppController
{
    /**
     * @var \devanych\cart\Cart $cart
     */
    public $cart;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->cart = Yii::$app->cart;
    }

    public function actionIndex()
    {
        return $this->render('index', [
            'cart' => $this->cart,
        ]);
    }
 
    public function actionAdd($id, $qty = 1)
    {
        try {
            $product = $this->getProduct($id);
            $quantity = $this->getQuantity($qty, $product->kol_in_storage);
            if ($item = $this->cart->getItem($product->id_product)) {
                $this->cart->plus($item->getId(), $quantity);
            } else {
                $this->cart->add($product, $quantity);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    public function actionChange($id, $qty = 1)
    {
        try {
            $product = $this->getProduct($id);
            $quantity = $this->getQuantity($qty, $product->quantity);
            if ($item = $this->cart->getItem($product->id)) {
                $this->cart->change($item->getId(), $quantity);
            }
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        try {
            $product = $this->getProduct($id);
            $this->cart->remove($product->id_product);
        } catch (\DomainException $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->redirect(['index']);
    }

    public function actionClear()
    {
        $this->cart->clear();
        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return Product the loaded model
     * @throws \DomainException if the product cannot be found
     */
    public function getProduct($id)
    {
        if (($product = Product::findOne((int)$id)) !== null) {
            return $product;
        }
        throw new \DomainException('Товар не найден');
    }

    /**
     * @param integer $qty
     * @param integer $maxQty
     * @return integer
     * @throws \DomainException if the product cannot be found
     */
    public function getQuantity($qty, $maxQty)
    {
        $quantity = (int)$qty > 0 ? (int)$qty : 1;
        if ($quantity > $maxQty) {
            throw new \DomainException('Товара в наличии всего ' . Html::encode($maxQty) . ' шт.');
        }
        return $quantity;
    }

    public function actionDebug()
    {




        
        $id =  $this->cart->getItems();
        debug($id);
        //$this->redirect(array('test/index', 'idp'=> $id));
    }
    public function actionAddToBuyer()
    {
        $id =  $this->cart->getItems();
       // debug($idp);
        $this->redirect(array('test/index', 'idp'=> $id));
    }
    public function actionAddToProductInOffer()
    {
        $id =  $this->cart->getItems();
       // debug($idp);
        $this->redirect(array('test/index', 'idp'=> $id));
    }
}