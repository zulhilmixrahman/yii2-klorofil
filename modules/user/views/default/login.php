<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';
?>

<div class="logo text-center">
    <img src="<?= Yii::$app->urlManager->baseUrl . '/web' ?>/img/logo-dark.png" alt="Klorofil Logo">
</div>
<?php $form = ActiveForm::begin([
    'options' => ['class' => 'form-auth-small'],
    'fieldConfig' => [
//        'template' => "<div class=\"col-lg-12\">{input}</div><div class=\"col-lg-12\">{error}</div>",
//        'labelOptions' => ['class' => 'col-lg-2 control-label'],
    ],
]); ?>
<?= $form->field($model, 'email')->input('text', ['placeholder' => Yii::t('user', 'Username')])->label(false) ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('user', 'Password')])->label(false) ?>
<?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?>
<div class="bottom">
    <span><i class="fa fa-lock"></i> <?= Html::a(Yii::t('user', 'Forgot password?'), ['/user/forgot']) ?></span>
</div>
<?php ActiveForm::end(); ?>
