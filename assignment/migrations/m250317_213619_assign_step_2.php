<?php

use yii\db\Migration;

class m250317_213619_assign_step_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		/**
		 * some documentation show Schema::TYPE_STRING
		 * some documentation show $this->string(64)
		 * raw SQL seems safest
		 */
		$this->createTable('application', [//not sure if this is the intended table name. At minimum my preferance would be "applications" plural
			'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
			'first_name' => 'VARCHAR(255) NOT NULL',
			'last_name' => 'VARCHAR(255) NOT NULL',
			'date_of_birth' => 'DATE NOT NULL', 
			'description' => 'LONGTEXT', 
			'income' => 'FLOAT', //not sure if you wanted DECIMAL/FLOAT/DOUBLE I know I've had with DECIMAL feilds in DOUBLE in the past, FLOAT seems to accept whole numbers and any [reasonable] number of decimal points
			'number_of_dependants' => 'TINYINT', 
			'created_at' => 'DATETIME DEFAULT CURRENT_TIMESTAMP', 
			'updated_at' => 'DATETIME ON UPDATE CURRENT_TIMESTAMP',
			'PRIMARY KEY (`id`)',
		]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250317_213619_assign_step_2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250317_213619_assign_step_2 cannot be reverted.\n";

        return false;
    }
    */
}
