<?php

use yii\db\Migration;

class m161209_033252_change_ownbuisness2_field extends Migration
{
    public function up()
    {
    $this->dropTable('rooms');
             $this->createTable('rooms', [
            'id' => $this->primaryKey(),
            'price'=>'integer',
            'own_or_business'=>'string',
            'square'=>'integer',
            'district'=>'string',
            'street'=>'string',
            'description'=>'text',
            'shortdistrict'=>'string',
            'manager'=>'string',
            'coment'=>'string',
            'url'=>'text',
            'site'=>'string',
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
