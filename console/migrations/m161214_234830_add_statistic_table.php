<?php

use yii\db\Migration;

class m161214_234830_add_statistic_table extends Migration
{
       public function up()
    {
     // $this->dropTable('rooms');
             $this->createTable('olxstatistic', [
            'id' => $this->primaryKey(),
            'shorturl'=>'string',
            'fullurl'=>'string',
            'someelse'=>'integer',
            'someelse2'=>'string',
            
        ]);
             
             
    }

    public function down()
    {
 $this->truncateTable('olxstatistic');
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
