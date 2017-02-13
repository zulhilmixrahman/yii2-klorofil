<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\user\models\Department;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\User $user
 * @var string $userDisplayName
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>
    <div style="margin: 5% auto;">
        <div class="col-md-offset-3 col-md-6 text-center">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?= $flash ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div style="margin: 5% auto;">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <?= Html::encode($this->title) ?>
                        </h3>
                    </div>
                    <div class="box-body">
                        <?php
                        $form = ActiveForm::begin([
                            'id' => 'register-form',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-10\">{input}</div>" .
                                    "<div class=\"col-md-offset-2 col-lg-10\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-2 control-label'],
                            ],
                            'enableAjaxValidation' => true,
                        ]);
                        $department = ArrayHelper::map(Department::find()->all(), 'id', 'name');
                        ?>
                        <?= $form->errorSummary($user); ?>

                        <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
                        <?= $form->field($user, 'fullname')->textInput(['maxlength' => 255]) ?>
                        <?= $form->field($user, 'department_id')->dropDownList($department, ['prompt' => Yii::t('user', '-- Please Select --')]) ?>
                        <?= $form->field($user, 'newPassword')->passwordInput() ?>
                        <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-success']) ?>
                                <?= Html::a(Yii::t('user', 'Login'), ["/user/login"], ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                        <?php if (Yii::$app->get("authClientCollection", false)): ?>
                            <div class="col-md-offset-2 col-md-10">
                                <?= yii\authclient\widgets\AuthChoice::widget([
                                    'baseAuthUrl' => ['/user/auth/login']
                                ]) ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

