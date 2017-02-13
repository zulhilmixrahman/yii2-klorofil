<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var bool $success
 * @var string $email
 */

$this->title = Yii::t('user', $success ? 'Confirmed' : 'Error');
?>
<div style="margin: 5% auto;">
    <div class="col-md-offset-3 col-md-6 text-center">
        <div class="row">
            <?php if ($success): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p><?= Yii::t("user", "Your email [ {email} ] has been confirmed", ["email" => $email]) ?></p>
                    <?php if (Yii::$app->user->isLoggedIn): ?>
                        <p><?= Html::a(Yii::t("user", "Go to my account"), ["/user/account"]) ?></p>
                        <p><?= Html::a(Yii::t("user", "Go home"), Yii::$app->getHomeUrl()) ?></p>
                    <?php else: ?>
                        <p><?= Html::a(Yii::t("user", "Log in here"), ["/user/login"]) ?></p>
                    <?php endif; ?>
                </div>
            <?php elseif ($email): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    [ <?= $email ?> ] <?= Yii::t("user", "Email is already active") ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?= Yii::t("user", "Invalid token") ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>