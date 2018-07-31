<?php

namespace app\modules\admin\models;


use Yii;
use dektrium\user\models\User;



/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $short_text
 * @property string $full_text
 * @property int $autor_id
 * @property string $main_image
 * @property string $url
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }


    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'autor_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'short_text', 'full_text', 'autor_id', 'main_image', 'url'], 'required'],
            [['short_text', 'full_text'], 'string'],
            [['autor_id', 'status'], 'integer'],
            ['autor_id','exist','targetClass'=>User::className(),'targetAttribute'=>'id'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'main_image', 'url'], 'string', 'max' => 255],
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
            'short_text' => 'Short Text',
            'full_text' => 'Full Text',
            'autor_id' => 'Autor ID',
            'main_image' => 'Main Image',
            'url' => 'Url alias',
            'status' => 'Published',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
