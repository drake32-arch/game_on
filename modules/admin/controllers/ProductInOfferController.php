<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\ProductInOffer;
use app\modules\admin\models\ProductInOfferSearch;
use app\modules\admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductInOfferController implements the CRUD actions for ProductInOffer model.
 */
class ProductInOfferController extends AdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductInOffer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductInOfferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductInOffer model.
     * @param integer $id_offer
     * @param integer $id_product
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_offer, $id_product)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_offer, $id_product),
        ]);
    }

    /**
     * Creates a new ProductInOffer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductInOffer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_offer' => $model->id_offer, 'id_product' => $model->id_product]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductInOffer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_offer
     * @param integer $id_product
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_offer, $id_product)
    {
        $model = $this->findModel($id_offer, $id_product);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_offer' => $model->id_offer, 'id_product' => $model->id_product]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductInOffer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_offer
     * @param integer $id_product
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_offer, $id_product)
    {
        $this->findModel($id_offer, $id_product)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductInOffer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_offer
     * @param integer $id_product
     * @return ProductInOffer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_offer, $id_product)
    {
        if (($model = ProductInOffer::findOne(['id_offer' => $id_offer, 'id_product' => $id_product])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
