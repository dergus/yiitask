<?php

use yii\db\Schema;
use yii\db\Migration;

class m150630_162205_create_table_books extends Migration
{
    public function up()
    {

        $this->createTable('books',['id'=>Schema::TYPE_PK,
            'name'=>Schema::TYPE_STRING,
            'date_create'=>Schema::TYPE_TIMESTAMP,
            'date_update'=>Schema::TYPE_TIMESTAMP,
            'preview'=>Schema::TYPE_STRING,
            'date'=>Schema::TYPE_DATE,
            'author_id'=>Schema::TYPE_INTEGER]);


    }

    public function down()
    {
        echo "m150630_162205_create_table_books cannot be reverted.\n";

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
