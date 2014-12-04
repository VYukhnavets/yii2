<?php

namespace app\modules\merchant\controllers;

use yii\web\Controller;
use app\modules\merchant\models\MerchantUsers;
use app\models\Application;

class DefaultController extends Controller
{
    
    public $layout = 'main';
    
    public function actionIndex()
    {
        $app_id = \Yii::$app->session['app_id'];
        $app = Application::findOne($app_id);
        return $this->render('index', ['app'=>$app]);
    }
}
