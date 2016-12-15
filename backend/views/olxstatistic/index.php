<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OlxstatisticSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Olxstatistics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="olxstatistic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Olxstatistic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shorturl:url',
            'fullurl:url',
            'someelse',
            'someelse2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
