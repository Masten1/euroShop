<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'url:url',
            #'img',

            [
                'attribute' => 'img',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img(Yii::getAlias('@web').$data->imageurl,
                        ['width' => '70px']);
                },
            ],
            //'description:ntext',
            [
                'attribute' => 'category_id',
                'value'=>function($data) { return $data->getCategoryName(); },
            ],
            'price',
            'oldPrice',
            // 'isRecommend',
            'inStock',
            // 'metaTitle:ntext',
            // 'metaDescription:ntext',
            // 'metaKeywords:ntext',
             //'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
