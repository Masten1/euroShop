<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'url:url',
            'name',
            [
                'attribute' => 'photo',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').$data->imageurl,
                        ['width' => '70px']);
                },
            ],
            'price',

            [
                'attribute' => 'navIcon',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').$data->iconurl,
                        ['width' => '70px']);
                },
            ],
            'weight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
