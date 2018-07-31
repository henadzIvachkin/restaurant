<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'short_text:html',

            [
                'label' => 'Author',
                'format' => 'raw',
                'attribute' => 'autor',
                'value' => function($data){
                    return $data->user->username;
                }

            ],


            [
                'label' => 'Image',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $data->main_image, 226, 100, 'outbound', 100)),[
                        'alt'=>$data->title,
                        'style'=>'min-width: 226px',
                    ]);
                },
            ],

            [
                    'label' => 'Published',
                    'format' => 'html',
                    'attribute' => 'status',
                    'value' => function($data) {
                        return ($data->status == 1)?('<span class="text-success">Yes</span>'):('<span class="text-danger">No</span>');
                    }
            ],

            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
