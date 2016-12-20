<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use yii\bootstrap\BootstrapAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


?>
<h1 class="text-center">Парсер DomRia</h1>



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
        <td>Статус</td>
         <td id="status"> </td>     
      </tr>
      
        <tr>
        <td>Отправлено запросов</td>
         <td id="send"> 0 </td>     
      </tr>
        <tr>
        <td>Пришло ответов</td>
         <td id="res">0</td>     
      </tr>
      
        <tr>
        <td>Собрано</td>
         <td id="welldone">0</td>     
      </tr>
      
           <tr>
        <td>Количество объэктов на страничке LIMIT 10 20 30 50 100</td>
           <td> 
           <label for="limit" class="pull-left"  > </label>  <input max="100" min="10" style="max-width: 80px;  text-align: center; " class="pull-left" value="20" type="number" class="form-control" id="limit"/>
      
            
           </td> 
             
      </tr>
      
      
       <tr>
        <td>Количество страниц для парсинга</td>
           <td> 
           <label for="from_count_pages" class="pull-left"  > От </label>  <input   min="0" style="max-width: 80px;  text-align: center; " class="pull-left" value="0" type="number" class="form-control" id="from"/>
          <input style="max-width: 80px;  text-align: center; " class="pull-right" value="50"  min="1" type="number" class="form-control" id="to"/>       <label for="count_pages" class="pull-right"  > До </label>
            
           </td> 
             
      </tr>
      
      
       <tr>
        <td>Интервалы запросов (сек.)</td>
           <td> <input style="max-width: 80px;  text-align: center;" value="8" type="number" class="form-control" id="time_limit"/></td> 
             
      </tr>
      
        <tr>
        <td>Debug</td>
           <td>     <div id="debug"> <?=$debug; ?> </div>    </td> 
             
      </tr>
      
      
      
      


    </tbody>
  </table>


<?php Pjax::end(); ?>   
<?= Html::a("Парсинг", ['parserdomria/testdata'], [ 'id'=>'btns_test','class' => 'btn btn-lg btn-primary ']) ?>

   <?php  //Html::a("Сбор урлов", ['parser/colecturls'], ['id'=>'btns', 'class' => 'btn btn-lg btn-primary ']) ?>
    <?php  //Html::a("Парсинг", ['parser/pars'], ['id'=>'btnparse', 'class' => 'btn btn-lg btn-success ']) ?>
    <?php  //Html::a("Stop", ['parser/colecturls'], ['id'=>'btnstop', 'class' => 'btn btn-lg btn-danger ']) ?>
    </div>
<div class="ddd">
<?php


$this->registerJs("$('#btns_test').click(btns_test_f);", \yii\web\View::POS_READY);

$this->registerJs("$('#btns').click(timer_colect_urls_start);", \yii\web\View::POS_READY);
$this->registerJs("$('#btnstop').click(timer_colect_urls_stop);", \yii\web\View::POS_READY);
$this->registerJs("$('#btnparse').click(timer_parse_urls_start);", \yii\web\View::POS_READY);
?>


</div>




<script>

var timerId;
var timerIdParse;
var timer_url_colect_tik=0;  // add to page
   var  interval_tick =   $('#time_limit').val()*1000;

var page_limit=$('#count_pages').val();
var page=0;


var send= 0;
var res= 0;




function btns_test_f(e){
     // начать повторы с интервалом 2 сек и уменьшать количиство страниц
          e.preventDefault();
          stop();
          $link = $(e.target);
      callUrl=$link.attr('href');
          
               $('#status').text('Обработка');
               
             
               var from=   parseInt($('#from').val(), 10);
                var to=  parseInt($('#to').val(), 10); 
                interval_tick=   $('#time_limit').val()*1000;
                timer_url_colect_tik=to-from;
                var limit=$('#limit').val();
                  page= from;
                  send=0;
                  res=0;
                 
                 
            timerIdParse = setInterval(function() {  
                
                       if(timer_url_colect_tik-- <=0) stop();
                
                                                             
                                         $('#send').text(++send);
                       
                      ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data:  { limit:limit, page:page++, npage: 0, time: "23pm" } 
        ,
     success: function(data){
        
         $('#res').text(++res);
        
        $('#status').text('Test success');
        
            console.log('colect: ' +data['colected']);
        if(data['colected']){
                             var c= parseInt( $('#welldone').text());
                             var b=parseInt(data['colected']);
                             
                             
            $('#welldone').text(c+b);
            
            }
        if(data['stop_timer']){ stop(); }
  }
    });
    }, interval_tick);
    
               

}

function timer_parse_urls_start(e){
     // начать повторы с интервалом 2 сек и уменьшать количиство страниц
          e.preventDefault();
          stop();
          
          interval_tick=   $('#time_limit').val()*1000;
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
}, interval_tick);
}

function timer_colect_urls_start(e){
    
    
         // $('#status').text('Обработка');
      page_limit= parseInt($('#count_pages').val(), 10); ; 
          timer_url_colect_tik =  parseInt($('#from_count_pages').val(), 10); 
          
          stop(); 
          interval_tick=   $('#time_limit').val()*1000;
       
     // начать повторы с интервалом 2 сек и уменьшать количиство страниц
          e.preventDefault();
          
         
          $('#status').text('Обработка');
           timerId = setInterval(function() {
             $('#status').text('Обработка');
                // console.log('from'+timer_url_colect_tik+' ---  to'+page_limit);
           if(timer_url_colect_tik >= page_limit) {stop();  $('#status').text('Закончено'); }
              
             if(timer_url_colect_tik++ ==0){
                url= 'https://www.olx.ua/nedvizhimost/prodazha-kvartir/od/';
             }else{
                 url = 'https://www.olx.ua/nedvizhimost/prodazha-kvartir/od/?page='+ timer_url_colect_tik;
             }      
        
    
   
      e.preventDefault();
       $link = $(e.target);
  
        callUrl=$link.attr('href');
         ajaxRequest = $.ajax({
        type: "post",
        dataType: 'json',
        url: callUrl,
        data:  { npage: 0, time: "2pm", url: url, } 
        ,
     success: function(data){
        if(data['colected']){$('#colected').text(data['colected']);}
        if(data['stop_timer']){  stop(); }
    console.log('msg suc: '+data['stop_timer']);
  }
    });
}, interval_tick);
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