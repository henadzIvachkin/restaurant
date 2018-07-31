<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\data\Pagination;


class BlogController extends \yii\web\Controller
{
    public $layout = 'restaurant';

    public function actionIndex()
    {
        // выполняем запрос
        $query = Post::find()->where(['status'=>1]);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->with('username')
            ->all();
        // Передаем данные в представление
        return $this->render('blog', [
            'posts' => $posts,
            'pages' => $pages,
        ]);

    }


    public function actionPost($post_id = null){
        $post = Post::findOne($post_id);
        if ($post === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'This post not found.');
        }
        return $this->render('post',
            [
                'post' => $post,
            ]);
    }


    public function actionAutor($autor_id = null){
        // выполняем запрос
        if ($autor_id == null) {
            $query = Post::find()->where(['status'=>1]);
        } else {
            $query = Post::find()->where(['status'=>1, 'autor_id'=>$autor_id]);
        }

        if ($query === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'Posts of this autor not found.');
        }
        // делаем копию выборки
        $countQuery = clone $query;

        if ($countQuery->count() == 0) { // item does not exist
            throw new \yii\web\HttpException(404, 'Posts of this autor not found.');
        }
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 5]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        // Передаем данные в представление
        return $this->render('blog', [
            'posts' => $posts,
            'pages' => $pages,
        ]);
    }


}
