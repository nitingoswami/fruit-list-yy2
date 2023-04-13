<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $family
 * @property string|null $order
 * @property string|null $genus
 * @property int $fruit_iid
 */
class Fruit extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fruit_iid'], 'required'],
            [['fruit_iid'], 'integer'],
            [['name', 'family', 'order', 'genus'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'family' => 'Family',
            'order' => 'Order',
            'genus' => 'Genus',
            'fruit_iid' => 'Fruit Iid',
        ];
    }

    public function getNutrition()
    {
        return $this->hasOne(Nutrition::className(), ['fruit_id' => 'id']);
    }
}
