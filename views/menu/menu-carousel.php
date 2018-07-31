<?php
use app\components\ReservationWidget;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Menus</h1>
                <p>Curabitur at dolor sed felis lacinia ultricies sit amet vel sem. Vestibulum diam leo, sodales tempor lectus sed, varius gravida mi.</p>
            </div>
        </div>
    </div>
</section>



<section class="breakfast-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="breakfast-menu-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="left-image">
                                <img src="/img/breakfast_menu.jpg" alt="Breakfast">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2><?= Html::a('Breakfast Menu',['/menu/list','type' => 'breakfast'])?></h2>
                            <div id="owl-breakfast" class="owl-carousel owl-theme">
                                <?php foreach($breakfast as $breakfastItem):?>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $breakfastItem->image, 231, 134, 'outbound', 100)),['alt' => $breakfastItem->name]); ?>
                                            <div class="price">$<?= $breakfastItem->price/100 ?></div>
                                            <div class="text-content">
                                                <h4><?= $breakfastItem->name ?></h4>
                                                <p><?= $breakfastItem->description ?></p>
                                                <p><?= Html::a('Read more', ['/menu/item/', 'id' =>$breakfastItem->id])?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="lunch-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="lunch-menu-content">
                    <div class="row">
                        <div class="col-md-7">
                            <h2><?= Html::a('Lunch Menu',['/menu/list','type' => 'lunch'])?></h2>
                            <div id="owl-lunch" class="owl-carousel owl-theme">
                                <?php foreach($lunch as $lunchItem):?>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $lunchItem->image, 231, 134, 'outbound', 100)),['alt' => $lunchItem->name]); ?>
                                            <div class="price">$<?= $lunchItem->price/100 ?></div>
                                            <div class="text-content">
                                                <h4><?= $lunchItem->name ?></h4>
                                                <p><?= $lunchItem->description ?></p>
                                                <p><?= Html::a('Read more', ['/menu/item/', 'id' => $lunchItem->id])?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="left-image">
                                <img src="/img/lunch_menu.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dinner-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="dinner-menu-content">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="left-image">
                                <img src="/img/dinner_menu.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2><?= Html::a('Dinner Menu',['/menu/list','type' => 'dinner'])?></h2>
                            <div id="owl-dinner" class="owl-carousel owl-theme">
                                <?php foreach($dinner as $dinnerItem):?>
                                    <div class="item col-md-12">
                                        <div class="food-item">
                                            <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $dinnerItem->image, 231, 134, 'outbound', 100)),['alt' => $dinnerItem->name]); ?>
                                            <div class="price">$<?= $dinnerItem->price/100 ?></div>
                                            <div class="text-content">
                                                <h4><?= $dinnerItem->name ?></h4>
                                                <p><?= $dinnerItem->description ?></p>
                                                <p><?= Html::a('Read more', ['/menu/item/', 'id' => $dinnerItem->id])?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="desserts-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="desserts-menu-content">
                        <div class="row">
                            <div class="col-md-7">
                                <h2><?= Html::a('Desserts Menu',['/menu/list','type' => 'desserts'])?></h2>
                                <div id="owl-desserts" class="owl-carousel owl-theme">
                                    <?php foreach($desserts as $dessertsItem):?>
                                        <div class="item col-md-12">
                                            <div class="food-item">
                                                <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $dessertsItem->image, 231, 134, 'outbound', 100)),['alt' => $dessertsItem->name]); ?>
                                                <div class="price">$<?= $dessertsItem->price/100 ?></div>
                                                <div class="text-content">
                                                    <h4><?= $dessertsItem->name ?></h4>
                                                    <p><?= $dessertsItem->description ?></p>
                                                    <p><?= Html::a('Read more', ['/menu/item/', 'id' => $dessertsItem->id])?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="/img/desserts-menu.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




<?php echo ReservationWidget::widget();?>