<?php

use app\modules\user\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\user\models\User $user
 */

$this->title = $user->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="application-index">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <?= Html::encode($this->title) ?>
                        </h3>
                        <span class="pull-right">
                            <?= Html::a(Yii::t('user', 'Update'), ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a(Yii::t('user', 'Delete'), ['delete', 'id' => $user->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('user', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </span>
                    </div>
                    <div class="box-body">
                        <?= DetailView::widget([
                            'model' => $user,
                            'attributes' => [
                                'email:email',
                                'fullname',
                                [
                                    'attribute' => 'department_id',
                                    'format' => 'raw',
                                    'value' => $user->department->name
                                ],
                                [
                                    'attribute' => 'role_id',
                                    'format' => 'raw',
                                    'value' => $user->role->name
                                ],
                                [
                                    'attribute' => 'pa_for',
                                    'format' => 'raw',
                                    'value' => ($user->role_id == 3) ? User::findOne($user->pa_for)->fullname : 'Tiada'
                                ],
                                'logged_in_ip',
                                'logged_in_at:datetime'
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
