<?php

namespace app\components;

use Yii;
use yii\grid\ActionColumn;
use yii\helpers\Html;

class eBMActionColumn extends ActionColumn
{
    public $headerOptions = [];
    public $template = '{view}{update}{delete}';
    public $buttonOptions = ['class' => 'btn btn-default btn-sm'];
    public $contentOptions = ['class' => 'text-center'];

    public function initDefaultButtons()
    {
        $width = count(array_filter(explode('{', $this->template))) * 50;
        $this->headerOptions = ['style' => 'width: ' . $width . 'px;'];

        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'View'),
                    'aria-label' => Yii::t('yii', 'View'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-search"></span>', $url, $options);
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-pencil"></span>', $url, $options);
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url, $model, $key) {
                $options = array_merge([
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                ], $this->buttonOptions);
                return Html::a('<span class="fa fa-times"></span>', $url, $options);
            };
        }
    }

}