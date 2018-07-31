<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $full_text
 * @property string $image
 * @property string $image_gallery
 * @property int $price
 * @property string $url_alias
 * @property string $type
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'price', 'url_alias', 'type'], 'required'],
            [['description', 'full_text', 'image_gallery', 'type'], 'string'],
            [['price', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image', 'url_alias'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'full_text' => 'Full Text',
            'image' => 'Image',
            'image_gallery' => 'Image Gallery',
            'price' => 'Price',
            'url_alias' => 'Url Alias',
            'type' => 'Type',
            'status' => 'Published',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return FoodQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FoodQuery(get_called_class());
    }
}
