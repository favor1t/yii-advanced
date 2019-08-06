<?php

use yii\db\Migration;

/**
 * Class m190806_174729_create_images_migration
 */
class m190806_174729_create_images_migration extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%images}}', [
            'id'            => $this->primaryKey(),
            'path'          => $this->string()->notNull(),
            'card_id'       => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'card_id_images_count-cards_id',
            '{{%cards_count}}',
            'card_id',
            '{{%cards}}',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('{{%images}}');
    }
}
