<?php

namespace app\commands;

use yii\console\Controller;

class ComposerPostactions extends Controller{
    
    public static function postInstall(){
        if(!is_dir('config')) mkdir('config');
        chmod('runtime', 777);
        chmod('web/assets', 777);
    }
    
    public static function postUpdate(){

    }
    
}

