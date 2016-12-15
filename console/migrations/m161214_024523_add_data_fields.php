<?php

use yii\db\Migration;

class m161214_024523_add_data_fields extends Migration
{
    public function up()
    {
             
             $this->dropTable('rooms');
             $this->createTable('rooms', [
            'id' => $this->primaryKey(),
            'shortdistrict'=>'string',
            'phone'=>'string',
            'price'=>'integer',
            'currency'=>'string',
            'price_m'=>'integer',
            'count_rooms'=>'integer',
            'square'=>'integer',
            'floor'=>'integer',
            'floors'=>'integer',
            'type'=>'string',
            'district'=>'string',
            'street'=>'string',
            'description'=>'text',
             'state'=>'string',
            
            
            'own_or_business'=>'string',
            'manager'=>'string',
            'coment'=>'string',
            'url'=>'text',
            'site'=>'string',
            'img'=>'text',
            'date'=>'datetime',
            
            
        ]);
             
             
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
