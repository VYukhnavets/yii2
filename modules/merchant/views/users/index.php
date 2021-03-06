<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'app_id',
            'first_name',
            'last_name',
            'email:email',
            // 'password',
            // 'status',
            // 'createtime:datetime',
            // 'updatetime:datetime',
            // 'lastvisit',
            // 'sess_id',
            // 'activation_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
