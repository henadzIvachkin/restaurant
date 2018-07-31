<?php
use app\components\SubscribeWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $food->name?></h1>
                    <p>Whatever drinking vinegar hella fingerstache shoreditch kickstarter kitsch. La croix hella iceland flexitarian letterpress.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="blog-page">
        <div class="container">
            <div class="row">


                <div class="col-md-8 col-md-offset-2">
                    <div class="food-item">
                        <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $food->image, 750, 400, 'outbound', 100))); ?>
                        <div class="price price-item">$<?= $food->price/100 ?></div>
                        <div class="text-content">
                            <h4><?= $food->name?></h4>
                            <p><?= $food->full_text?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php echo SubscribeWidget::widget();?>