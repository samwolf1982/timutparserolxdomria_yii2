<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Olxstatistic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="olxstatistic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shorturl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullurl')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'someelse')->textInput() ?>

    <?= $form->field($model, 'someelse2')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
