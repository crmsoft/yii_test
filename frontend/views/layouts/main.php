<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">

    <header>

        <div class="row">
            <div class="col logo-holder">
                <img src="/img/logo.png" alt="logo">
            </div>
            <div class="col">
                <div class="display-table">
                    <div class="table-cell">
                        <div>
                            <h1 class="title d-inline">
                                Review Score
                            </h1>
                        </div>
                        <div>
                            <h2 class="title d-inline">
                                Bewertungen finder leichtgemacht
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-right">
                <div class="display-table">
                    <div class="table-cell">
                        <div class="btn-group">
                            <a href="#not-implented" class="btn btn-link">
                                REVIEWSCORE
                            </a>
                                <a href="/login" class="btn btn-link">LOGIN</a>
                                <a href="/products" class="btn btn-primary">
                                    FUR HANDLER
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <?= $content ?>


    <footer>
        <div class="text-center">
            <div class="d-inline">
                <img src="/img/logo.png" alt="Logo">
            </div>
            <div class="d-inline title">
                Review Score
            </div>
            <div class="copyright">
                Copyright 2015 - 2017 Review Bridge Research GmbH - Alle Rechte vorbehalten
            </div>
            <ul class="footer-nav">
                <li>
                    <a href="#">EINFACH.KAUFEN</a>
                </li>
                <li>
                    <a href="#">IMPRESSUM</a>
                </li>
                <li>
                    <a href="#">DATENSCHUTZ</a>
                </li>
                <li>
                    <a href="#">KONTAKT</a>
                </li>
                <li>
                    <a href="#">AGB VVERBRAUCHER</a>
                </li>
                <li><a href="#">AGB HANDLER</a></li>
            </ul>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
