<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RoomsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rooms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'own_or_business') ?>

    <?= $form->field($model, 'square') ?>

    <?= $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'shortdistrict') ?>

    <?php // echo $form->field($model, 'manager') ?>

    <?php // echo $form->field($model, 'coment') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'site') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
