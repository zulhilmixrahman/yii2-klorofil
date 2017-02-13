<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<h2 class="headline text-danger">
    <i class="fa fa-warning"></i> <?= '#' . $statusCode . ': ' . $name ?>
</h2>
<div class="error-content">
    <?php if ($statusCode == 403) { ?>
        <h3><?= nl2br(Html::encode($message)) ?></h3>
    <?php } else { ?>
        <?php if (YII_DEBUG && YII_ENV == 'dev') { ?>
            <h3><?= nl2br(Html::encode($message)) ?></h3>
        <?php } ?>
        <p>
            The above error occurred while the Web server was processing your request.
            Please contact us if you think this is a server error. Thank you.
            Meanwhile, you may <a href='<?= Yii::$app->homeUrl ?>'>return to home</a>.
        </p>
    <?php } ?>
</div>
