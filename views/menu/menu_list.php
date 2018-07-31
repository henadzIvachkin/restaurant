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



    <section class="featured-food">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <?php if($oneType):?>
                        <h2><?php if($food[0]->type){echo $food[0]->type;} ?></h2>
                    <?php else:?>
                        <h2>Menu Items</h2>
                    <?php endif;?>

                </div>
            </div>

            <?php if($food): ?>
                <?php $count = 0;?>
                <?php foreach ($food as $foodItem): ?>
                    <?php if($count%3 == 0):?>
                        <div class="row">
                    <?php endif; ?>
                        <div class="col-md-4">
                            <div class="food-item">
                                <?php if(!$oneType):?>
                                    <h2><?= Html::a(ucfirst($foodItem->type),['/menu/list','type' => $foodItem->type])?></h2>
                                <?php endif;?>
                                <?= Html::img(Url::toRoute(\Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $foodItem->image, 300, 200, 'outbound', 100))); ?>
                                <div class="price">$<?= $foodItem->price/100 ?></div>
                                <div class="text-content">
                                    <h4><?= $foodItem->name ?></h4>
                                    <p><?= $foodItem->description ?></p>
                                    <p><?= Html::a('Read more', ['/menu/item/', 'id' => $foodItem->id])?></p>
                                </div>
                            </div>
                        </div>
                    <?php $count++;?>
                    <?php if($count == 3):?>
                        </div>
                        <?php $count = 0;?>
                    <?php endif; ?>
                <?php endforeach;?>

            <?php endif; ?>


        </div>
    </section>



<?php echo ReservationWidget::widget();?>