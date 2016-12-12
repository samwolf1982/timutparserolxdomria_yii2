<?php

use yii\db\Migration;

class m161212_102158_add_new_fields_likedok extends Migration
{
    public function up()
    {
       $this->dropTable('rooms');
             $this->createTable('rooms', [
            'id' => $this->primaryKey(),
            'shortdistrict'=>'string',
            'price'=>'integer',
            'currency'=>'string',
            'count_rooms'=>'integer',
            'square'=>'integer',
            'floor'=>'integer',
            'floors'=>'integer',
            'type'=>'string',
            'district'=>'string',
            'street'=>'string',
            'description'=>'text',
            
            
            
            'own_or_business'=>'string',
            'manager'=>'string',
            'coment'=>'string',
            'url'=>'text',
            'site'=>'string',
            'img'=>'text',
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
