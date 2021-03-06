<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MyAsset;
use app\assets\CustomAsset;

MyAsset::register($this);
CustomAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="header">
    <div class="container">
        <a href="#" class="navbar-brand scroll-top">Victory</a>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!--/.navbar-header-->
            <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?= \yii\helpers\Url::Home(); ?>" >Home</a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute('/menu/menu-carousel'); ?>">Our Menus</a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute('/blog/'); ?>">Blog Entries</a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute('/site/contact'); ?>">Contact Us</a></li>
                </ul>
            </div>
            <!--/.navbar-collapse-->
        </nav>
        <!--/.navbar-->
    </div>
    <!--/.container-->
</div>
<!--/.header-->


<?= $content ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Copyright &copy; <?= date('Y') ?> Henadz</p>
            </div>
            <div class="col-md-4">
                <ul class="social-icons">
                    <li><a rel="nofollow" href="http://www.facebook.com/templatemo" target="_parent"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul>
                <?php
                echo Yii::$app->user->isGuest ? (
                    '<li>'
                    . Html::a('Login',['/user/login'])
                    . '</li>'

                ) : (
                    '<li>'
                    . Html::a('Logout (' . Yii::$app->user->identity->username . ')',['/user/security/logout'],['data-method'=>'post'])
                    . '</li>'
                    .'<li>'
                    . Html::a('Admin panel',['/admin'])
                    . '</li>'
                )
                ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
