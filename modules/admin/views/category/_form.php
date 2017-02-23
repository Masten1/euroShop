<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if ($model->photo) echo "<img src='$model->imageurl'>"?>

    <?= $form->field($model, 'file')->fileInput(); ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php if ($model->navIcon) echo "<img src='$model->iconurl'>"?>

    <?= $form->field($model, 'fileIcon')->fileInput(); ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
