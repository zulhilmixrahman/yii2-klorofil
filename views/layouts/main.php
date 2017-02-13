<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
app\assets\AppAsset::register($this);
$directoryWeb = Yii::$app->urlManager->baseUrl . '/web';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?php isset($this->title) ? Html::encode($this->title) : Yii::$app->name ?></title>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="wrapper">
    <!-- SIDEBAR -->
    <?= $this->render('menu-left.php', ['directoryWeb' => $directoryWeb]); ?>
    <!-- END SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- NAVBAR -->
        <?= $this->render('menu-top.php', ['directoryWeb' => $directoryWeb]); ?>
        <!-- END NAVBAR -->
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <?= $this->render(
                    'content.php',
                    ['content' => $content, 'directoryWeb' => $directoryWeb]
                ) ?>
            </div>
        </div>
        <!-- END MAIN CONTENT -->

        <footer>
            <div class="container-fluid">
                <p class="copyright">
                    Copyright &copy; <?= date('Y') ?> <a href="http://demo.themeineed.com/free-dashboard-template/klorofil/">Klorofil</a>.</strong> All rights reserved.
                </p>
            </div>
        </footer>
    </div>
    <!-- END MAIN -->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
