<?php

use yii\db\Schema;
use yii\db\Migration;

class m150630_164926_create_table_authors extends Migration
{
    public function up()
    {
        $this->createTable('authors',[
            'id'=>Schema::TYPE_PK,
            'firstname'=>Schema::TYPE_STRING,
            'firstname'=>Schema::TYPE_STRING,

           ]);



    }


    public function down()
    {
        echo "m150630_164926_create_table_authors cannot be reverted.\n";

        return false;
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
