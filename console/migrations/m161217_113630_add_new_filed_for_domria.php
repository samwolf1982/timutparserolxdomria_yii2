<?php

use yii\db\Migration;

class m161217_113630_add_new_filed_for_domria extends Migration
{
    public function up()
    {
     //             $this->createTable('coordinates', [
//            'id' => $this->primaryKey(),
//            'longitude'=>'float(14)',
//            'latitude'=>'float(14)',
//            
//        ]);
        
                   $this->createTable('rooms_to_coordinates', [
            'id' => $this->primaryKey(),
            'id_rooms'=>'int',
            'id_coordinates'=>'int',
            
        ]);
        
        
    }

    public function down()
    {
        
             //$this->dropTable('coordinates');
             $this->dropTable('rooms_to_coordinates');
  
        return true;
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
