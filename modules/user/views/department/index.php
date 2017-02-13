<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\search\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('department', 'Departments');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="department-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= Html::encode($this->title) ?>
                    </h3>
                    <span class="pull-right">
                        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('department', 'Create Department'), ['create'], ['class' => 'btn btn-success']) ?>
                    </span>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            'created_at:datetime',
                            'updated_at:datetime',
                            ['class' => 'app\components\eBMActionColumn'],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
