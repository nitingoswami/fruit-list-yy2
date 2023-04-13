<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "favorites".
 *
 * @property int $id
 * @property int $user_id
 * @property int $fruit_id
 */
class Favorite extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'fruit_id'], 'required'],
            [['user_id', 'fruit_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fruit_id' => 'Fruit ID',
        ];
    }

    public function getFruit()
    {
        return $this->hasOne(Fruit::className(), ['id' => 'fruit_id']);
    }
}
