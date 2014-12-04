<?php

namespace app\modules\merchant;

class Merchant extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\merchant\controllers';

    public function init()
    {
        if(!empty(\Yii::$app->request->get('id'))){
            \Yii::$app->session['app_id'] = \Yii::$app->request->get('id');
        }
        if(empty(\Yii::$app->session['app_id'])){
            throw new \yii\web\HttpException('403', 'Access denied. Empty app_id');
        }
        parent::init();

        // custom initialization code goes here
    }
}
