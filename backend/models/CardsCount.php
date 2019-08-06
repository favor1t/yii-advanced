<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cards_count".
 *
 * @property int $card_id
 * @property int $count
 *
 * @property Cards $card
 * @property Cards $card0
 */
class CardsCount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards_count';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['card_id'], 'required'],
            [['card_id', 'count'], 'integer'],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cards::className(), 'targetAttribute' => ['card_id' => 'id']],
            [['card_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cards::className(), 'targetAttribute' => ['card_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'card_id' => 'Card ID',
            'count' => 'Count',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard()
    {
        return $this->hasOne(Cards::className(), ['id' => 'card_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard0()
    {
        return $this->hasOne(Cards::className(), ['id' => 'card_id']);
    }
}
