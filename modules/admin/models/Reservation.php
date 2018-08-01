<?php

namespace app\modules\admin\models;

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
 * @property tyniint $status
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
            [['hour', 'persons'], 'integer'],
            [['day'], 'string'],
            [['status'], 'integer'],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReservationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservationQuery(get_called_class());
    }
}
