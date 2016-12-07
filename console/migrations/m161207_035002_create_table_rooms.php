<?php

use yii\db\Migration;

class m161207_035002_create_table_rooms extends Migration
{
    public function up()
    {
          $this->createTable('rooms', [
            'id' => $this->primaryKey(),
            'price'=>'integer',
            'own_or_business'=>'boolean',
            'square'=>'integer',
            'district'=>'string',
            'street'=>'string',
            'description'=>'text',
            'shortdistrict'=>'string',
            'manager'=>'integer',
            'coment'=>'integer',
            'url'=>'text',
            'site'=>'string',
        ]);  
    }

    public function down()
    {
       $this->dropTable('rooms');
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
