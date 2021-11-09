<?php

namespace app\modules\admin;
use yii;
use yii\filters\AccessControl;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
      
        $this->layout = '@app/modules/admin/views/layouts/main';
        // custom initialization code goes here
    }

    // public function behaviors() {
    //     return[
    //         'access' =>[
    //             'class' => AccessControl::className(),
    //             'rules' =>[
    //                 [
    //                 'allow' => true,
    //                 'roles' =>['@']

    //                 ],
    //             ],

    //         ]
        
    //      ];

    // }

}
