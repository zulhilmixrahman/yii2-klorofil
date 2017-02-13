<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\User $user
 * @var bool $success
 * @var bool $invalidToken
 */

$this->title = Yii::t('user', 'Reset');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <p><?= Yii::t("user", "Password has been reset") ?></p>
                <p><?= Html::a(Yii::t("user", "Log in here"), ["/user/login"]) ?></p>
            </div>
        <?php elseif (!empty($invalidToken)): ?>
            <div class="alert alert-danger"><p><?= Yii::t("user", "Invalid token") ?></p></div>
        <?php else: ?>
            <div class="alert alert-warning">
                <p><?= Yii::t("user", "Email") ?> [ <?= $user->email ?> ]</p>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'reset-form']); ?>
            <?= $form->field($user, 'newPassword')->passwordInput() ?>
            <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton(Yii::t("user", "Reset"), ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        <?php endif; ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->