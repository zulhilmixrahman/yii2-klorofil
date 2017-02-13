<?php

use app\modules\user\models\Department;
use app\modules\user\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Profile $profile
 * @var app\modules\user\models\Role $role
 * @var yii\widgets\ActiveForm $form
 */

$module = $this->context->module;
$role = $module->model("Role");
$topManagement = ArrayHelper::map(User::findAll(['role_id' => 2]), 'id', 'fullname');
//$department = ArrayHelper::map(Department::find()->all(), 'id', 'name');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => 255, 'disabled' => !$user->isNewRecord]) ?>
    <?= $form->field($user, 'fullname')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($user, 'department_id')->dropDownList(Department::dropdown(), [
        'prompt' => Yii::t('user', '-- Please Select --')
    ]); ?>
    <?= $form->field($user, 'role_id')->dropDownList($role::dropdown(), [
        'prompt' => Yii::t('user', '-- Please Select --'),
        'onchange' => "if($(this).val() == 3){
                            $('#user-pa_for').prop('disabled', false);
                        }else{
                            $('#user-pa_for').prop('disabled', true);
                        }",
    ]); ?>
    <?= $form->field($user, 'pa_for')->dropDownList($topManagement, [
        'prompt' => Yii::t('user', '-- Please Select --'),
        'disabled' => ($user->isNewRecord ? true : ($user->pa_for != 3 ? true : false))
    ]); ?>
    <?= $form->field($user, 'status')->dropDownList($user::statusDropdown(), [
        'value' => $user->isNewRecord ? User::STATUS_ACTIVE : null,
        'prompt' => Yii::t('user', '-- Please Select --')
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($user->isNewRecord ? Yii::t('user', 'Create') : Yii::t('user', 'Update'), ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
