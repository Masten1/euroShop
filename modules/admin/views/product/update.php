<?php

use yii\helpers\Html;
use zxbodya\yii2\galleryManager;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = 'Update Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php
    if ($model->isNewRecord) {
        echo 'Can not upload images for new record';
    } else {
        echo galleryManager\GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'product/galleryApi'
            ]
        );
    }
    ?>

</div>
