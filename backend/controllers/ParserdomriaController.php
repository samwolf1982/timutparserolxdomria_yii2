<?php

namespace backend\controllers;
use Yii;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use common\models\Rooms;
use common\models\Olxstatistic;
use yii\db\Migration;
use yii\web\Response;


Yii::$classMap['phpQuery'] = Yii::getAlias('@backend') .
    '/vendors/phpQuery/phpQuery/phpQuery.php';

class ParserdomriaController extends \yii\web\Controller
{
    
     public $count_page = 0;
    public function actionIndex()
    {
         $room = new Rooms();
        $total = Rooms::find()->count();
        $olx_total = Rooms::find()->where(['site' => 'OLX'])->count();
        $domria_total = Rooms::find()->where(['site' => 'DR'])->count();
        $new_urls = 0;


        $this->clear_all_data();


        return $this->render('index', ['total' => $total, 'olx_total' => $olx_total,
            'domria_total' => $domria_total, 'new_urls' => $new_urls, 'count_page' => $this->count_page, 'debug'=>'debug val' ]);
    }
    
    
    
    
public function actionTestdata() {
    
$this->clear_all_data();  
$dont_know='Не определено';


 $state_id=12;// одесская
$sities_category=[332,];// uj
$cur_index_sity=0;

 $sity_id_like_form= urlencode( 'city_id['.$cur_index_sity.']' ).'='.$sities_category[$cur_index_sity]; 

                
        $path='https://dom.ria.com/searchEngine/?page=0&new_search=1&limit=50&from_realty_id=&to_realty_id=&sort=0&category=1&realty_type=0&operation_type=1&state_id={$state_id}&'.urlencode( 'city_id['.$cur_index_sity.']').'='.$sities_category[$cur_index_sity].'&characteristic%5B209%5D%5Bfrom%5D=&characteristic%5B209%5D%5Bto%5D=&characteristic%5B214%5D%5Bfrom%5D=&characteristic%5B214%5D%5Bto%5D=&characteristic%5B216%5D%5Bfrom%5D=&characteristic%5B216%5D%5Bto%5D=&characteristic%5B218%5D%5Bfrom%5D=&characteristic%5B218%5D%5Bto%5D=&characteristic%5B227%5D%5Bfrom%5D=&characteristic%5B227%5D%5Bto%5D=&characteristic%5B228%5D%5Bfrom%5D=&characteristic%5B228%5D%5Bto%5D=&characteristic%5B234%5D%5Bfrom%5D=&characteristic%5B234%5D%5Bto%5D=&characteristic%5B242%5D=239&characteristic%5B265%5D=0&realty_id_only=&date_from=&date_to=&with_phone=&exclude_my=&new_housing_only=&banks_only=&email=&period=0';
        
//     $path=   'https://dom.ria.com/searchEngine/?page=0&new_search=1&limit=10&from_realty_id=&to_realty_id=&sort=0&category=13&realty_type=0&operation_type=1&state_id=12&city_id%5B2%5D=334&characteristic%5B210%5D%5Bfrom%5D=&characteristic%5B210%5D%5Bto%5D=&characteristic%5B217%5D%5Bfrom%5D=&characteristic%5B217%5D%5Bto%5D=&characteristic%5B214%5D%5Bfrom%5D=&characteristic%5B214%5D%5Bto%5D=&characteristic%5B219%5D%5Bfrom%5D=&characteristic%5B219%5D%5Bto%5D=&characteristic%5B226%5D=0&characteristic%5B227%5D%5Bfrom%5D=&characteristic%5B227%5D%5Bto%5D=&characteristic%5B228%5D%5Bfrom%5D=&characteristic%5B228%5D%5Bto%5D=&characteristic%5B234%5D%5Bfrom%5D=&characteristic%5B234%5D%5Bto%5D=&characteristic%5B242%5D=239&characteristic%5B265%5D=0&realty_id_only=&date_from=&date_to=&with_phone=&exclude_my=&new_housing_only=&banks_only=&email=&period=0';
    
             // city_id%5B0%5D%3D332
             //city_id%5B0%5D=332
          //$path='https://dom.ria.com/searchEngine/?page=0&new_search=1&limit=50&from_realty_id=&to_realty_id=&sort=0&category=1&realty_type=0&operation_type=1&state_id={$state_id}&city_id%5B0%5D=332&characteristic%5B209%5D%5Bfrom%5D=&characteristic%5B209%5D%5Bto%5D=&characteristic%5B214%5D%5Bfrom%5D=&characteristic%5B214%5D%5Bto%5D=&characteristic%5B216%5D%5Bfrom%5D=&characteristic%5B216%5D%5Bto%5D=&characteristic%5B218%5D%5Bfrom%5D=&characteristic%5B218%5D%5Bto%5D=&characteristic%5B227%5D%5Bfrom%5D=&characteristic%5B227%5D%5Bto%5D=&characteristic%5B228%5D%5Bfrom%5D=&characteristic%5B228%5D%5Bto%5D=&characteristic%5B234%5D%5Bfrom%5D=&characteristic%5B234%5D%5Bto%5D=&characteristic%5B242%5D=239&characteristic%5B265%5D=0&realty_id_only=&date_from=&date_to=&with_phone=&exclude_my=&new_housing_only=&banks_only=&email=&period=0';
$responce_domria = @file_get_contents($path,true);
 $root_site='https://dom.ria.com/ru/';

     

if( !$responce_domria   ){$responce_domria='empty responce BAD !!';}
else{
    
    
    $obj=json_decode($responce_domria);
    
    foreach ($obj->items as $key => $value) {
   
     $url=$value->beautiful_url;
   // 1436 собственикб   1435 представитель хозяина 1434 посредник 1473 предс застройщика
      $ob_arr=[1436=>'Частного лица', 1435=>'Частного лица' ,1434 =>'Бизнес', 1473 =>'Бизнес',] ;
      
     $own_biss=$value->characteristics_values->{1437};
     $own_biss=$ob_arr[$own_biss];
     
     $tmp_price=  $value->priceArr->{3};
     $tmp_price = trim($tmp_price);
     $price = preg_replace('/[^0-9]+/','', $tmp_price);
     
     $square= $value->total_square_meters;
     
     $district=$value->city_name;
     
     $street=isset( $value->street_name) ?$value->street_name:'Улица не определена' ;
     
     $description=$value->description;
     
       // title
     $array_des=explode(" ",$description); 
                   $shortdistrict='';
                   $ii=0;
                      foreach ($array_des as $v) {
                       if($ii++ >5)break;
                       
                       $shortdistrict.=' '.$v;
                   }
     
     
     $img=[];
             $img= $this->generate_img_url($value->photos,$url)  ;
             
              $img =
                    json_encode($img, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP |JSON_UNESCAPED_UNICODE); 
                    
                    $currency= 'грн';
     

           // проверка на урл
              // перенос проверки на присутсвие сюда, на страничку нету смысла идти
                    $count = Rooms::find()->select(['id'])->where(['url' => $url])->limit(1)->count(); 
                
                $count=0;
                if ($count > 0)    {
                    echo json_encode(['stop_timer' => false, 'info'=>'is present', 'present_url'=>$url, 'colected' => count(Yii::$app->session->
                get('welldone', 0))], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); die();
                }
     
     // data in db
     
     $floor=   isset( $value->floor) ? $value->floor: $dont_know ;
     $floors=isset( $value->floors_count) ?$value->floors_count:$dont_know;
     // если застройщик тогда Новостройки иначе  Вторичный рынок
     
                                                //1473
     if($value->characteristics_values->{1437}==1473){
         $type='Новостройки'; 
     } else{
         $type='Вторичный рынок';
     }
    
    
    
                $phone=array();
                
                // get tel 
                // url https://dom.ria.com/node/api/getOwnerAndAgencyDataByIds?userId=5390464
                //https://dom.ria.com/node/api/getOwnerAndAgencyDataByIds?userId=5390464&agencyId=0&langId=2&_csrf=t1chwaXH-3PiLKvfGBEjVdSE8LFGHob-bIwk

$ptel=     'https://dom.ria.com/node/api/getOwnerAndAgencyDataByIds?userId='.$value->user_id;
  $responce_tel = @file_get_contents($ptel,true);

     

if( !$responce_tel   ){$phone=['empty_'];}
else{
      $telresp=json_decode($responce_tel); 
      
      
       foreach ($telresp->owner->owner_phones as $k => $pho) {
        
        $phone[]=$pho->phone;
        }
    
    }      
    
    $phone=implode("|", $phone);        
    
    
           
        if($square==0 || empty($square)||empty($price)){$price_m=0;}
               else{
                 //$price_m=  $contact->price/$contact->square;
                $price_m= intval($price)/intval($square);
                }           
     
          $count_rooms = isset( $value->total_square_meters) ?$value->total_square_meters: 0;
     
     
     // порода дерева
    // $state=>
     
     
     
     
                 
//                 $arr=['price'=>$root_site.$value->beautiful_url, 'ownbis'=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ''=>$value->, ];
//                 
              // $contact->date=date("Y-m-d H:i:s");  
              $arr=   ['price'=>$price, 'own_biss'=>$own_biss,'square'=>$square,'district'=>$district,'street'=>$street,'description'=>$description,'shortdistrict'=>$shortdistrict,'manager'=>"********",'coment'=>'********','url'=>$root_site.$url,'site'=>'DomRia','img'=>$img,'currency'=> $currency,'floor'=>$floor,'floors'=>$floors,'type'=>$type,'phone'=>$phone,'price_m'=>$price_m,'count_rooms'=>$count_rooms, ];
              
                   $this->  write_to_db($arr) ;
                     echo json_encode(['stop_timer' => false, 'info'=> $arr, 'present_url'=>$url, 'colected' => count(Yii::$app->session->
                get('welldone', 0))], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);       
            
                              
            
            
            
            
            
            
                
             
//              echo json_encode(['stop_timer' => false, 'info'=> $arr, 'present_url'=>$url, 'colected' => count(Yii::$app->session->
//                get('welldone', 0))], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT |
//                JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
                
               
                 die();
                   
                             
           
           
    
    
    
        break;
        }
    
    
    
}    


  return $this->renderAjax('index', [ 'debug'=> $responce_domria,  'total' => $total=-9, 'olx_total' => $olx_total=-9,
            'domria_total' => $domria_total=-9,  'count_page' => $count_page=-9, ]);

//\phpQuery::ajaxAllowHost('www.olx.ua');
//$path_site = 'https://www.olx.ua/nedvizhimost/prodazha-kvartir/od/';
//\phpQuery::get($path_site, function ($do)use ($path_site)
//{
//
//    $document = \phpQuery::newDocument($do); $bread1 = '.item.fleft'; $bread1a = $document->
//        find($bread1); foreach ($bread1a as $key => $value) {
//
//        /*   $b1[]=trim(pq($value)->find('a')->attr('href'));*/
//        $temp = pq($value)->text() . PHP_EOL; $temp = preg_replace('/[^0-9]+/', '', $temp);
//            $all_num[] = intval($temp); // echo pq($value)->attr('href').PHP_EOL;
//        }
//    $count_page = max($all_num); Yii::$app->session->set('count_page', $count_page);
//        Yii::$app->session->set('votes', $count_page);
//        
//         //die();
//    }
//);

}    
    
    
    public function clear_all_data() {
// обнуление всех сесий

Yii::$app->session->set('count_page', 0);
Yii::$app->session->set('votes', 0); //  количесвто доступных страниц (500)
Yii::$app->session->set('count_url_page_index', 1); // индекс для сбора урлов 0-500 * 38
Yii::$app->session->set('all_urls', 0); // массив урлов (новых)
Yii::$app->session->set('colected', 0); // сколько собрано урлов для обработки статистика
Yii::$app->session->set('welldone', 0); // сколько собрано обїєктов для обработки статистика

Yii::$app->session->set('datapage', 0); // все урли + цена замена для all_urls

}




public function generate_img_url($photos,$url_pretty,$url_to_img='https://cdn.riastatic.com/photosnew/dom/photo/'){
    
    //examlpe path to img    url+  id + fl.jpg   !!!!!!!!
    //https://cdn.riastatic.com/photosnew/dom/photo/realty-perevireno-prodaja-kvartira-odessa-malinovskiy-parkovaya__48523787fl.jpg
   
    $res=array();
           
    $pos      = strripos($url_pretty ,'-' );
   

if ($pos === false) {
    return $res;
} else {
    
    
    $rest = substr($url_pretty,0, $pos); 
    

    $rest.='__';
  

    
}
    foreach ($photos as $key1 => $value) {
                   
                            //$exten=  pathinfo($value->file);
                    // $ext = explode(".",$value->file );
                    $fileName_arr = explode(".",$value->file);

                      $arrLength = count($fileName_arr);
                      
                      
                          // \Yii::info("own1: ", $fileName_arr[$arrLength - 1]); 
                        $res[]=   $url_to_img. $rest.$value->id."fl.".$fileName_arr[$arrLength - 1];
                         
                         
                   }
    
        return $res;
    
      //       "photos":{
//            "59761497":{
//               "id":59761497,
//               "file":"dom/photo/5976/597614/59761497/59761497.jpg"
//            },
//            "59761501":{
//               "id":59761501,
//               "file":"dom/photo/5976/597615/59761501/59761501.jpg"
//            },
//       
//         },
          
          
          
}


public function write_to_db($arr){
         $contact = new Rooms();
                     $contact->price = $arr['price'];
                      $contact-> own_or_business =$arr['own_biss'];
                       $contact->square = $arr['square'];
                        $contact->district = $arr['district'];
                        $contact->street = $arr['street'];
                         $contact->description = $arr['description'];
                          $contact->shortdistrict = $arr['shortdistrict'];
                    $contact->manager = $arr['manager'];
                        $contact->coment = $arr['coment'];
                       $contact->url = $arr['url'];
                       $contact->site = $arr['site'];
                         $contact->img = $arr['img'];

                          $contact->currency=$arr['currency'];
//                          
                         $contact->date=date("Y-m-d H:i:s"); 
//                          
                        $contact->floor=$arr['floor'];
                          $contact->floors=$arr['floors'];
                          $contact->type=$arr['type'];
                         
//                          
                           $contact->phone=$arr['phone'];
//                              
//
                
                  $contact->price_m= (int) ($arr['price_m']);
// 
                        $contact->state='Состояние';
//              
                        $contact->count_rooms=$arr['count_rooms'];
                        
                        if ($contact->validate()) { $contact->save(); }
else { 
                     
 }
                        
        print_r($contact->errors);     
}

}
