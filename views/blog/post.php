<?php
    use app\components\SubscribeWidget;
?>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $post->title?></h1>
                <p>Whatever drinking vinegar hella fingerstache shoreditch kickstarter kitsch. La croix hella iceland flexitarian letterpress.</p>
            </div>
        </div>
    </div>
</section>


<section class="blog-page">
    <div class="container">
        <div class="row">


            <div class="col-md-8 col-md-offset-2">
                <div class="blog-item">
                    <img src="<?= \Yii::$app->imageresize->getUrl(\Yii::getAlias('@webroot') . $post->main_image, 750, 331, 'outbound', 100)?>" alt="<?= $post->title?>">
                    <div class="date"><?= Yii::$app->formatter->asDate($post->created_at, 'dd MMM Y')?></div>
                    <div class="down-content">
                        <h4><?= $post->title?></h4>
                        <span>Author: <a href="<?= \yii\helpers\Url::toRoute(['/blog/autor','autor_id'=>$post->autor_id]); ?>"><?= $post->username->username ?></a> </span>
                        <?php if(!\Yii::$app->user->isGuest):?>
                            <div class="text-button">
                                <a href="<?= \yii\helpers\Url::toRoute(['/admin/post/update','id'=>$post->id]); ?>">Edit post</a>
                            </div>
                        <?php endif;?>
                        <p><?= $post->full_text?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php echo SubscribeWidget::widget();?>