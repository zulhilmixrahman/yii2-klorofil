<?php
use kartik\widgets\AlertBlock;
use yii\widgets\Breadcrumbs;

?>
<?= AlertBlock::widget(['useSessionFlash' => true, 'delay' => 0]) ?>
<div class="panel">
    <div class="panel-heading">
        <div class="right">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => ['class' => 'breadcrumbs']
            ]) ?>
        </div>
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h4 class="panel-title"><?= $this->blocks['content-header'] ?></h4>
        <?php } else { ?>
            <h4 class="panel-title">
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h4>
        <?php } ?>
        <hr>
    </div>
    <div class="panel-body">
        <?= $content ?>
    </div>
</div>

