<?php

namespace app\commands;

use yii\console\Controller;

class ComposerPostactions extends Controller{
    
    public static function postInstall(){
        if(!is_dir('config')) mkdir('config');
        chmod('runtime', 0777);
        chmod('web/assets', 0777);
        file_put_contents('web/index.php', '<?php
// comment out the following two lines when deployed to production
defined(\'YII_DEBUG\') or define(\'YII_DEBUG\', true);
defined(\'YII_ENV\') or define(\'YII_ENV\', \'dev\');
require(__DIR__ . \'/../vendor/autoload.php\');
require(__DIR__ . \'/../vendor/yiisoft/yii2/Yii.php\');
$config = require(__DIR__ . \'/../config/web.php\');
(new yii\web\Application($config))->run();');
        chmod('web/index.php', 0755);
        
    }
    
    public static function postUpdate(){

    }
    
}

