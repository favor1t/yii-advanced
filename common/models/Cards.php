<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\elasticsearch\ActiveRecord;

/**
 * This is the model class for table "cards".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $image_id
 *
 * @property CardsCount[] $cardsCounts
 * @property CardsCount[] $cardsCounts0
 */
class Cards extends ActiveRecord
{
    /**
     * @return array the list of attributes for this record
     */
    public function attributes()
    {
        // path mapping for '_id' is setup to field 'id'
        return ['id', 'title', 'description', 'image_id'];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['image_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardsCounts()
    {
        return $this->hasMany(CardsCount::className(), ['card_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardsCounts0()
    {
        return $this->hasMany(CardsCount::className(), ['card_id' => 'id']);
    }

    public function incrementCount(): self
    {
        if($this->id) {
            $cardCount = CardsCount::findOne($this->id);
            if($cardCount) {
                $cardCount->card_id = $this->id;
                $cardCount->count   += 1;
                if(!$cardCount->save()) new Exception(__METHOD__ . ' cannot increment card count');
            }
        }
        return $this;
    }
}
