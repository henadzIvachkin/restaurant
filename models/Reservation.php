<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property int $day
 * @property int $hour
 * @property string $full_name
 * @property string $phone
 * @property int $persons
 * @property string $created_at
 * @property string $updated_at
 */
class Reservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['day', 'hour', 'full_name', 'phone', 'persons'], 'required'],
            [['day', 'hour', 'persons'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['full_name', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'Day',
            'hour' => 'Hour',
            'full_name' => 'Full Name',
            'phone' => 'Phone',
            'persons' => 'Persons',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
