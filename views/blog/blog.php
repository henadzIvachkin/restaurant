<?php
    use yii\widgets\LinkPager;
    use app\components\SubscribeWidget;
?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Our Blog</h1>
                <p>Whatever drinking vinegar hella fingerstache shoreditch kickstarter kitsch. La croix hella iceland flexitarian letterpress.</p>
            </div>
        </div>
    </div>
</section>


<section class="blog-page">
    <div class="container">
        <div class="row">

            <?php foreach($posts as $post):?>
            <div class="col-md-8 col-md-offset-2">
                <div class="blog-item">
                    <img src="<?= \Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $post->main_image, 750, 331, 'outbound', 100)?>" alt="<?= $post->title?>">
                    <div class="date"><?= Yii::$app->formatter->asDate($post->created_at, 'dd MMM Y')?></div>
                    <div class="down-content">
                        <h4><?= $post->title?></h4>
                        <span>Author: <a href="<?= \yii\helpers\Url::toRoute(['/blog/autor','autor_id'=>$post->autor_id]); ?>"><?= $post->username->username?></a> </span>
                        <p><?= $post->short_text?></p>
                        <div class="text-button">
                            <a href="<?= \yii\helpers\Url::toRoute(['/blog/post','url'=>$post->url,'post_id'=>$post->id]); ?>">Continue Reading</a>
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

            <div class="col-md-8 col-md-offset-2">
                <?php
                // отображаем постраничную разбивку
                echo LinkPager::widget([
                    'pagination' => $pages,
                    'nextPageLabel' =>'>>',
                    'prevPageLabel' =>'<<',
                    'options' => [
                            'class'=>'page-number',
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</section>

<?php echo SubscribeWidget::widget();?>