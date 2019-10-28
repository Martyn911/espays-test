<?php

use yii\db\Migration;

/**
 * Class m191028_090552_auto
 */
class m191028_090552_auto extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('auto', [
            'id' => $this->primaryKey(),
            'mark' => $this->string(100)->notNull(),
            'model' => $this->string(50)->notNull(),
            'number' => $this->string()->notNull(),
            'color' => $this->string()->notNull(),
            'payed' => $this->smallInteger(),
            'comment' => $this->string(500)
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('auto');
    }
}
