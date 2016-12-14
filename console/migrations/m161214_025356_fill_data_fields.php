<?php

use yii\db\Migration;
use common\models\Rooms;
use Faker\Provider\DateTime;
class m161214_025356_fill_data_fields extends Migration
{
    public function up()
    {
       $faker = Faker\Factory::create();
         
       foreach (range(0, 50) as $number) {
           
            $contact = new Rooms();
             $contact->price= $faker->numberBetween(50000,250000);            
             $contact->count_rooms= $faker->numberBetween(1,12);
              $contact->floor= $faker->numberBetween(25,250);
               $contact->floors= $faker->numberBetween(1,24);
            
            $contact->own_or_business= $faker->numberBetween(0,1)?'own':'bis';
            $contact->square=$faker->numberBetween(35,150);
            $contact->district=$faker->state; 
            $contact->street=$faker->streetName ; 
            $contact->description=$faker->text;                 
            $contact->shortdistrict=$faker->sentence;
             $contact->manager=$faker->numberBetween(0,1)?'Ãàëÿ':'Îëÿ';  
                      
            $contact->coment=$faker->text; 
            $contact->phone=$faker->text;  
            
            
           $contact->price_m=$faker->numberBetween(35,150);
            $contact->url=$faker->url;
            $contact->site= "OLX";
            
             
             $val=$faker->dateTimeThisYear;
             
            // echo var_dump( $val,true);
            $contact->date= $val->format('Y-m-d H-i-s');
           //  $contact->date= '9999-12-31 23:59:59' ;
                 
            $contact->save();
            $contact=null;
            
          
          
    
            
            }
    }

    public function down()
    {
         
                  $this->truncateTable('rooms');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
