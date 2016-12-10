<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use yii\bootstrap\BootstrapAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


?>
<h1 class="text-center">Парсер OLX</h1>



  <div class="">
  <p> Сейчас в базе всего:   <?=$total;?> объэктов.</p>
   <p> OLX:   <?=$olx_total;?></p>
   <p> Domria:   <?= $domria_total;?></p>
    
    </div>
    
    
    
    <div class="">
   
    <?php //Pjax::begin(['id' => 'admin-crud-id', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'POST']]) ?>

      
    </div>
    
        <div class="">
   
   
     <?php Pjax::begin(['id' => 'admin-crud-id2', 'timeout' => false, 'enablePushState' => false, 'clientOptions' => ['method' => 'POST','async'=>false,]]) ?>
        <hr />     
  <table class="table table-bordered">
    <tbody>
       <tr>
        <td>Доступно для парсинга</td>
         <td id="urlpages"><?= $count_page; ?>&nbsp;страниц</td>     
      </tr>
        <tr>
        <td>Статус</td>
         <td id="status"> </td>     
      </tr>
      
        <tr>
        <td>Собрано</td>
         <td id="colected"> 0 </td>     
      </tr>
        <tr>
        <td>Добавлено в базу</td>
         <td id="welldone">0</td>     
      </tr>


    </tbody>
  </table>
<?= Html::a("Доступные страницы", ['parser/countpage'], ['class' => 'btn btn-lg btn-primary '],['data-pjax'=>1]) ?>

<?php Pjax::end(); ?>
   <?= Html::a("Сбор урлов", ['parser/colecturls'], ['id'=>'btns', 'class' => 'btn btn-lg btn-primary ']) ?>
    <?= Html::a("Парсинг", ['parser/pars'], ['id'=>'btnparse', 'class' => 'btn btn-lg btn-success ']) ?>
    <?= Html::a("Stop", ['parser/colecturls'], ['id'=>'btnstop', 'class' => 'btn btn-lg btn-danger ']) ?>
    </div>
<div class="ddd">
<?php


$this->registerJs("$('#btns').click(timer_colect_urls_start);", \yii\web\View::POS_READY);
$this->registerJs("$('#btnstop').click(timer_colect_urls_stop);", \yii\web\View::POS_READY);
$this->registerJs("$('#btnparse').click(timer_parse_urls_start);", \yii\web\View::POS_READY);
?>


</div>




<script>

var timerId;
var timerIdParse;
var page_limit=3;

function timer_parse_urls_start(e){
     // начать повторы с интервалом 2 сек и уменьшать количиство страниц
          e.preventDefault();
          stop();
               $('#status').text('Обработка');
timerIdParse = setInterval(function() {
     e.preventDefault();
     $link = $(e.target);
      callUrl=$link.attr('href');
         ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data:  { npage: 0, time: "23pm" } 
        ,
     success: function(data){
        if(data['welldone']){$('#welldone').text(data['welldone']);}
        if(data['stop_timer']){ stop(); }
    console.log('msg: STOOP ! '+data['stop_timer']);
  }
    });
}, 3000);
}

function timer_colect_urls_start(e){
          page_limit=5;
       
     // начать повторы с интервалом 2 сек и уменьшать количиство страниц
          e.preventDefault();
          
          stop();
          $('#status').text('Обработка');
timerId = setInterval(function() {
      e.preventDefault();
       $link = $(e.target);
       if( (page_limit--)<=0 ){stop(); console.log('stop page limit') }
        callUrl=$link.attr('href');
         ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data:  { npage: 0, time: "2pm" } 
        ,
     success: function(data){
        if(data['colected']){$('#colected').text(data['colected']);}
        if(data['stop_timer']){  stop(); }
    console.log('msg: '+data['stop_timer']);
  }
    });
}, 3000);
}
function timer_colect_urls_stop(e){
      e.preventDefault();

     stop();
     clear_all();
     
}

function timerfun(e) {
 
    e.preventDefault();
 
    var
        $link = $(e.target),
        callUrl = $link.attr('href'),
        formId = $link.data('formId'),
        onDone = $link.data('onDone'),
        onFail = $link.data('onFail'),
        onAlways = $link.data('onAlways'),
        ajaxRequest;
 
 
    ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data:  { npage: 0, time: "2pm" } 
        ,
     success: function(data){
    console.log('msg'+data);
  }
    });
 




 
}

function stop(){
    $('#status').text('Закончено'); 
      clearInterval(timerId);
      clearInterval(timerIdParse);
     
}
function clear_all(){
    $('#status').text('Закончено'); 
     $('#colected').text('0'); 
      $('#urlpages').text('0 страниц'); 
      $('#welldone').text('0'); 
      clearInterval(timerId);
      clearInterval(timerIdParse);
     
}

function handleAjaxLink(e) {
 
    e.preventDefault();
 
    var
        $link = $(e.target),
        callUrl = $link.attr('href'),
        formId = $link.data('formId'),
        onDone = $link.data('onDone'),
        onFail = $link.data('onFail'),
        onAlways = $link.data('onAlways'),
        ajaxRequest;
 
 
    ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data: (typeof formId === "string" ? $('#' + formId).serializeArray() : null)
        ,
     success: function(data){
    console.log('msg'+data);
  }
    });
 




 
}

</script>