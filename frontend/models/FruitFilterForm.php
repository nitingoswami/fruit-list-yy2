<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Fruit;

/**
 * Signup form
 */
class FruitFilterForm extends Model
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['family', 'string', 'min' => 2, 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function getFruitList()
    {

    }
}
