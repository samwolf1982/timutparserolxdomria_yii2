<?php

use yii\db\Migration;
use common\models\Rooms;
class m161212_210832_fill_demo extends Migration
{
    public function up()
    {
       foreach (range(0, 50) as $number) {
            $faker = Faker\Factory::create();
            $contact = new Rooms();
             $contact->price= $faker->numberBetween(50000,250000);            
           // $contact->own_or_business= $faker->numberBetween(0,1)?'own':'bis';
             $contact->square=$faker->numberBetween(35,150);
            $contact->district=$faker->state; 
            $contact->street=$faker->streetName ; 
            $contact->description=$faker->text;                 
            $contact->shortdistrict=$faker->sentence;
             $contact->manager=$faker->numberBetween(1,20);             
            $contact->coment=$faker->numberBetween(1,5);
           // $contact->phone=$faker->text;  
            
            
          // $contact->price_m=$faker->numberBetween(35,150);
            $contact->url=$faker->url;
            $contact->site= "OLX";
            $contact->save();
            
          
          
    
            
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