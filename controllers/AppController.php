<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AppController extends Controller
{
    protected function setMeta($title = null){
        $this->store->title = $title;
    }
}