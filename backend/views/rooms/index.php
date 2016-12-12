<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use yii\widgets\Pjax;

use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Rooms;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rooms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rooms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'resizableColumns'=>true,
    'hover'=>true,
        //'hover'=>true,
        'exportConfig'=>[ 
 GridView::CSV => [
        'label' => "Save as CSV",
        'icon' => true? 'file-code-o' : 'floppy-open', 
        'iconOptions' => ['class' => 'text-primary'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => "export",
        'alertMsg' => "error",
        'options' => ['title' =>"export file",
        'mime' => 'application/csv',
        'config' => [
            'colDelimiter' => ",",
            'rowDelimiter' => "\r\n",
        ]
    ],],],
        
         'toolbar'=>[
        '{export}',
        '{toggleData}'
    ],
    
     'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-home"></i> Квартиры</h3>',
        'type'=>'success',
        'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info']),
        'footer'=>false
    ],
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
           

           
           
           
           
           
           
           
           

                  [
            'attribute'=>'id', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
                 [
            'attribute'=>'shortdistrict', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 350px;     max-height: 120px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
           
           // 'perfectScrollbar'=>true,
            ],
          
            
            
             [
            'attribute'=>'price',
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 350px;     max-height: 120px;  overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
           
           // 'perfectScrollbar'=>true,
            ],
            
                           [
            'attribute'=>'currency', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
                            [
            'attribute'=>'count_rooms', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
             'square',
             
                                        [
            'attribute'=>'floor', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
                                       [
            'attribute'=>'floors', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
                                            [
            'attribute'=>'type', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
              [
            'attribute'=>'description', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 350px;     max-height: 120px;  width: 200px;
    height: 100px; overflow: hidden;  white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
           
           // 'perfectScrollbar'=>true,
            ],
                
    
            
                                                [
            'attribute'=>'own_or_business', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
            
                                                [
            'attribute'=>'manager', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
                                                [
            'attribute'=>'coment', 
            'class' => 'kartik\grid\DataColumn',
            'noWrap' => false,
            //the line below has solved the issue
            'contentOptions' => 
            ['style'=>'max-width: 50px;     max-height: 120px; width:50px; overflow: auto; white-space: pre-wrap; /* css-3 */
 white-space: -moz-pre-wrap; /* Mozilla, начиная с 1999 года */
 white-space: -pre-wrap; /* Opera 4-6 */
 white-space: -o-pre-wrap; /* Opera 7 */
 word-wrap: break-word; ']
            ,
            ],
            
                                                   
                                                      [
           'label'=>'SITE',
           'format' => 'raw',
       'value'=>function ($data) {
             return Html::a($data->site,$data->url);
        },
    ],
            
            
                 [
            'class' => 'kartik\grid\ExpandRowColumn',
            'expandOneOnly' => false,
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {                                        
                return   $model->img   ;
            },

        ],

            // 'floor',
            // 'floors',
            // 'type',
            // 'district',
            // 'street',
            // 'description:ntext',
            // 'own_or_business',
            // 'manager',
            // 'coment',
            // 'url:ntext',
            // 'site',
            // 'img:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
