<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'user_name',
            'user_pwd',
            'sex',
            'height',
            // 'birthday',
            // 'detail',
            // 'register_time',
            // 'email:email',
            // 'marital_state',
            // 'salary',
            // 'degree',
            // 'province',
            // 'City',
            // 'Image',
            // 'age',
            // 'hobby',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
