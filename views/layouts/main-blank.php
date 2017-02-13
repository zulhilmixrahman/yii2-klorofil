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
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container">
            <div class="panel">
                <div class="panel-heading">
                    <?php if (isset($this->blocks['content-header'])) { ?>
                        <h4 class="panel-title"><?= $this->blocks['content-header'] ?></h4>
                    <?php } else { ?>
                        <h4 class="panel-title">
                            <?php
                            if ($this->title !== null) {
                                echo \yii\helpers\Html::encode($this->title);
                            } else {
                                echo \yii\helpers\Inflector::camel2words(
                                    \yii\helpers\Inflector::id2camel($this->context->module->id)
                                );
                                echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                            } ?>
                        </h4>
                    <?php } ?>
                    <hr>
                </div>
                <div class="panel-body">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
