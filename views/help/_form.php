<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Help */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="help-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php if($model->getErrors()) : ?>
        <?= $form->errorSummary($model); ?>
    <?php endif;?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'published')->checkbox() ?>
    
    <?= $form->field($model, 'content')->widget(letyii\tinymce\Tinymce::className(), [
            'options' => [
                'id' => 'content',
            ],
            'configs' => [ // Read more: http://www.tinymce.com/wiki.php/Configuration
                'height' => '400',
                'menubar' => 'false',
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
