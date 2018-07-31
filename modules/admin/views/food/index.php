<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\FoodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="food-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Food', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'description:ntext',
            //'full_text:ntext',
            [
                'label' => 'Image',
                'format' => 'raw',
                'attribute' => 'image',
                'value' => function($data){
                    return Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $data->image, 226, 100, 'outbound', 100)),[
                        'alt'=>$data->name,
                        'style'=>'min-width: 226px',
                    ]);
                },
            ],
            //'image_gallery:ntext',
            [
                'label' => 'Price',
                'format' => 'raw',
                'attribute' => 'price',
                'value' => function($data) {
                    return $data->price/100;
                }
            ],
            //'url_alias:url',
            'type',
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
