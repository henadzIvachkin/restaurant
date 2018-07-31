<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 24.07.2018
 * Time: 10:12
 */

namespace app\modules\admin\models;


use yii\base\Model;

class FileForm extends Model
{
    public $file = '';

    public function rules(){
        return [
            ['file','required'],
            ['file','string']
        ];
    }


    public function attributeLabels(){
        return [
          'file' => 'Select file to upload'
        ];
    }
}