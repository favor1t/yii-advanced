<?php

use yii\db\Migration;
use \yii\db\Schema;
/**
 * 1) Создать приложение на Yii2 Advanced, позволяющее создать карточку с наименованием, описанием, картинкой (загружается при создании), количеством просмотров.
 * Class m190806_174643_create_cards_migration
 */
class m190806_174643_create_cards_migration extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%cards}}', [
            'id'            => $this->primaryKey(),
            'title'         => $this->string()->notNull(),
            'description'   => $this->text()->notNull(),
            'image_id'      => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%cards}}');
    }
}
