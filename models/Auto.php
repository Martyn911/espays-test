<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auto".
 *
 * @property int $id
 * @property string $mark
 * @property string $model
 * @property string $number
 * @property string $color
 * @property int $payed
 * @property string $comment
 */
class Auto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mark', 'model', 'number', 'color'], 'required'],
            //https://habr.com/ru/post/110731/
            ['number', 'match', 'pattern' => '/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', 'message' => 'Телефон указан неверно'],
            [['payed'], 'integer'],
            [['mark'], 'string', 'max' => 100],
            [['model'], 'string', 'max' => 50],
            [['number', 'color'], 'string', 'max' => 255],
            [['comment'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mark' => Yii::t('app', 'Марка'),
            'model' => Yii::t('app', 'Модель'),
            'number' => Yii::t('app', 'Номер телефона'),
            'color' => Yii::t('app', 'Цвет'),
            'payed' => Yii::t('app', 'Оплачена'),
            'comment' => Yii::t('app', 'Примечание'),
        ];
    }

    public static function colors($color = null)
    {
        $colors = [
            'red' => 'Красный',
            'white' => 'Белый',
            'black' => 'Черный',
            'other' => 'Другой'
        ];

        return $color !== null && isset($colors[$color]) ? $colors[$color] : $colors;
    }
}
