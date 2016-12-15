<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Olxstatistic */

$this->title = 'Update Olxstatistic: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Olxstatistics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="olxstatistic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
