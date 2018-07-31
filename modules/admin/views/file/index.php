<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\FileForm */
/* @var $form ActiveForm */
?>
<div class="index">

    <?php $form = ActiveForm::begin(); ?>

        <?=
        $form->field($model, 'file')->widget(InputFile::className(), [
            'language'      => 'en',
            'controller'    => 'elfinderText', // вставляем название контроллера, по умолчанию равен elfinder
            'filter'        => 'text',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
            'options'       => ['class' => 'form-control'],
            'buttonOptions' => ['class' => 'btn btn-default'],
            'multiple'      => false       // возможность выбора нескольких файлов
        ]);
        ?>

        <div class="form-group">
            <?= Html::submitButton('<i class="fa fa-magic"></i> Process File', ['class' => 'btn btn-primary']) ?>
            <?php if (isset($downloadLink)): ?>
                <?= Html::a('<i class="fa fa-cloud-download"></i> Download File', $downloadLink,['class' => 'btn btn-success', 'role'=>'button','download'=>''])?>
            <?php endif;?>
        </div>
    <?php ActiveForm::end(); ?>

    <?php
        if (isset($errorMessage)){
            echo "<div class='text-danger'>" . $errorMessage . "</div>";
        }
    ?>
    <?php
    if (isset($fileContent)){
        echo "<div class='text-success'>" . $fileContent . "</div>";
    }
    ?>

</div><!-- index -->
