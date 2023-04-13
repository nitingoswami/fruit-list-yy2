<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nutritions".
 *
 * @property int $id
 * @property float|null $calories
 * @property float|null $fat
 * @property float|null $sugar
 * @property float|null $carbohydrates
 * @property float|null $protein
 * @property int $fruit_id
 */
class Nutrition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nutritions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calories', 'fat', 'sugar', 'carbohydrates', 'protein'], 'number'],
            [['fruit_id'], 'required'],
            [['fruit_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calories' => 'Calories',
            'fat' => 'Fat',
            'sugar' => 'Sugar',
            'carbohydrates' => 'Carbohydrates',
            'protein' => 'Protein',
            'fruit_id' => 'Fruit ID',
        ];
    }
}
