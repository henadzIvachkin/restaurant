<?php
    use app\components\ReservationWidget;
    use app\components\SubscribeWidget;
    use yii\helpers\Html;
    use yii\helpers\Url;
?>
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h4>Here you can find delecious foods</h4>
                <h2>Asian Restaurant</h2>
                <p>Quisque nec nibh id lacus fringilla eleifend sed sit amet sem. Donec lectus odio, mollis a nisl non, tempor interdum nisl.</p>
                <div class="primary-button">
                    <a href="#" class="scroll-link" data-id="book-table">Order Right Now</a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="cook-delecious">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="first-image">
                    <img src="/img/cook_01.jpg" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="cook-content">
                    <h4>We cook delecious</h4>
                    <div class="contact-content">
                        <span>You can call us on:</span>
                        <h6>+ 1234 567 8910</h6>
                    </div>
                    <span>or</span>
                    <div class="primary-white-button">
                        <a href="#" class="scroll-link" data-id="book-table">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="second-image">
                    <img src="/img/cook_02.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>



<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <?= Html::tag('a',
                            Html::img('/img/cook_breakfast.png',['alt' => 'Breakfast']).' '.
                            Html::tag('h4', 'Breakfast'),
                            ['href' => Url::toRoute(['/menu/list', 'type' => 'breakfast'])])
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <?= Html::tag('a',
                        Html::img('/img/cook_lunch.png',['alt' => 'Lunch']).' '.
                        Html::tag('h4', 'Lunch'),
                        ['href' => Url::toRoute(['/menu/list', 'type' => 'lunch'])])
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <?= Html::tag('a',
                        Html::img('/img/cook_dinner.png',['alt' => 'Dinner']).' '.
                        Html::tag('h4', 'Dinner'),
                        ['href' => Url::toRoute(['/menu/list', 'type' => 'dinner'])])
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="service-item">
                    <?= Html::tag('a',
                        Html::img('/img/cook_dessert.png',['alt' => 'Desserts']).' '.
                        Html::tag('h4', 'Desserts'),
                        ['href' => Url::toRoute(['/menu/list', 'type' => 'desserts'])])
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo ReservationWidget::widget();?>

<section class="get-app">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Get application for your phone</h2>
            </div>
            <div class="primary-white-button">
                <a href="#">Download now</a>
            </div>
        </div>
    </div>
</section>



<section class="featured-food">
    <div class="container">
        <div class="row">
            <div class="heading">
                <h2>Weekly Featured Food</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="food-item">
                    <h2>Breakfast</h2>
                    <?= Html::img('@web/img/'.$breakfast->image, ['alt' => 'breakfast image']) ?>
                    <div class="price">$<?= $breakfast->price/100 ?></div>
                    <div class="text-content">
                        <h4><?= $breakfast->name ?></h4>
                        <p><?= $breakfast->description ?></p>
                        <p><?= Html::a('Read more', ['/menu/item/', 'id' => $breakfast->id])?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <h2>Lunch</h2>
                    <?= Html::img('@web/img/'.$lunch->image, ['alt' => 'breakfast image']) ?>
                    <div class="price">$<?= $lunch->price/100 ?></div>
                    <div class="text-content">
                        <h4><?= $lunch->name ?></h4>
                        <p><?= $lunch->description ?></p>
                        <p><?= Html::a('Read more', ['/menu/item/', 'id' => $lunch->id])?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="food-item">
                    <h2>Dinner</h2>
                    <?= Html::img('@web/img/'.$dinner->image, ['alt' => 'breakfast image']) ?>
                    <div class="price">$<?= $dinner->price/100 ?></div>
                    <div class="text-content">
                        <h4><?= $dinner->name ?></h4>
                        <p><?= $dinner->description ?></p>
                        <p><?= Html::a('Read more', ['/menu/item/', 'id' => $dinner->id])?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="our-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Our blog post</h2>
                </div>
            </div>
        </div>
        <div class="row">


            <?php foreach($posts as $post):?>
            <div class="col-md-6">
                <div class="blog-post">
                    <img src="<?= \Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $post->main_image, 278, 244)?>" alt="<?= $post->title?>">
                    <div class="date"><?= Yii::$app->formatter->asDate($post->created_at, 'dd MMM Y')?></div>
                    <div class="right-content">
                        <h4><?= $post->title?></h4>
                        <span>Autor: <a href="<?= \yii\helpers\Url::toRoute(['blog/autor','autor_id'=>$post->autor_id]); ?>"><?= $post->username->username?></a> </span>
                        <p><?= $post->short_text?></p>
                        <div class="text-button">
                            <a href="<?= \yii\helpers\Url::toRoute(['blog/post','url'=>$post->url,'post_id'=>$post->id]); ?>">Continue Reading</a>
                        </div>
                        <?php if(!\Yii::$app->user->isGuest):?>
                            <div class="text-button">
                                <a href="<?= \yii\helpers\Url::toRoute(['admin/post/update','id'=>$post->id]); ?>">Edit post</a>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>


    </div>
</section>



<?php echo SubscribeWidget::widget();?>