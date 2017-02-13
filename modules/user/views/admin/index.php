<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\search\UserSearch $searchModel
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\Role $role
 */

$module = $this->context->module;
$user = $module->model("User");
$role = $module->model("Role");
$department = $module->model("Department");

$this->title = Yii::t('user', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                    <span class="pull-right">
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('user', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
                    </span>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'pjax' => true,
                        'responsive' => true,
                        'hover' => true,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'email:email',
                            'fullname',
                            [
                                'attribute' => 'department_id',
                                'label' => Yii::t('user', 'Department'),
                                'filter' => $department::dropdown(),
                                'value' => function ($model, $index, $dataColumn) use ($department) {
                                    $departmentDropdown = $department::dropdown();
                                    return $departmentDropdown[$model->department_id];
                                },
                            ],
                            [
                                'attribute' => 'role_id',
                                'label' => Yii::t('user', 'Role'),
                                'filter' => $role::dropdown(),
                                'value' => function ($model, $index, $dataColumn) use ($role) {
                                    $roleDropdown = $role::dropdown();
                                    return $roleDropdown[$model->role_id];
                                },
                            ],
                            [
                                'attribute' => 'status',
                                'label' => Yii::t('user', 'Status'),
                                'filter' => $user::statusDropdown(),
                                'value' => function ($model, $index, $dataColumn) use ($user) {
                                    $statusDropdown = $user::statusDropdown();
                                    return $statusDropdown[$model->status];
                                },
                            ],
                            ['class' => 'app\components\eBMActionColumn'],
                        ],

                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
