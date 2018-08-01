<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Reservation */

$this->title = $model->full_name." | ".$model->day;
$this->params['breadcrumbs'][] = ['label' => 'Reservations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'day',
            'hour',
            'full_name',
            'phone',
            'persons',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($data){
                    return ($data->status == 0)? "<span class='text-danger'>New</span>" : "<span class='text-success'>Approved</span>";
                }
            ],

            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
