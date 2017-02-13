<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\forms\ForgotForm $model
 */

$this->title = Yii::t('user', 'Forgot password');
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>
        <?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>
            <div class="alert alert-success"><p><?= $flash ?></p></div>
            <?= Html::a(Yii::t('user', '<< Back to login page'), ['/user/login'], ['class' => 'btn btn-primary btn-block btn-flat']) ?>
        <?php else: ?>
            <?php $form = ActiveForm::begin(['id' => 'forgot-form']); ?>
            <?= $form->field($model, 'email') ?>
            <?= Html::submitButton(Yii::t('user', 'Submit'), ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
            <br/>
            <div class="row">
                <div class="col-md-6 text-info text-left">
                    <?= Html::a(Yii::t('user', '<< Back to login page'), ['/user/login']) ?>
                </div>
                <div class="col-md-6 text-info text-right">
                    <?= Html::a(Yii::t('user', 'Forgot password?'), ['/user/forgot']) ?><br/>
                    <?= Html::a(Yii::t('user', 'Register new user'), ['/user/register']) ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
