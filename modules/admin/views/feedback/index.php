<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Feedback', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="tested">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model, $index, $widget, $grid){
            //return ['background-color:'.$model->status->background_color.';'];
            return ['class'=>$model->getStatusColor()];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mail',
            'text:ntext',
            'ctime',
            [
                'attribute' => 'status_id',
                'value'=>function($data) { return $data->getStatusName(); },
                'contentOptions' => ['class' => function($data) { return $data->getStatusColor(); }]
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],

    ]); ?>
    </div>
</div>
