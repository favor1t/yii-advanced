<?php

use yii\db\Migration;
use \yii\db\Schema;
/**
 * Class m190806_174655_create_cards_count_migration
 */
class m190806_174655_create_cards_count_migration extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%cards_count}}', [
            'card_id'       => $this->primaryKey(),
            'count'         => $this->integer(),
        ]);
        $this->addForeignKey(
            'card_id_cards_count-cards_author_id',
            '{{%cards_count}}',
            'card_id',
            '{{%cards}}',
            'id'
        );
    }

    public function down()
    {
        $this->dropTable('{{%cards_count}}');
    }
}
