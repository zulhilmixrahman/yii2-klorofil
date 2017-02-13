<?php

use edofre\fullcalendar\Fullcalendar;
use yii\helpers\Url;
use yii\web\JsExpression;

$this->title = Yii::t('app', 'Applications');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row clearfix">
    <div class="col-md-offset-3 col-md-6">
        <?= Fullcalendar::widget([
            'options' => [
                'id' => 'calendar',
                'language' => 'ms',
            ],
            'clientOptions' => [
                'selectable' => false,
                'selectHelper' => false,
                'eventLimit' => true,
                'eventClick' => new JsExpression("function(calEvent, jsEvent, view) {
                                $('#modalTitle').html(calEvent.title);
                                $('#modalBody').html(calEvent.details);
                                $('#modalEvent').modal('show');
                            }")
            ],
            'events' => Url::to(['site/events']),
        ]);
        ?>
    </div>
</div>
<div id="modalEvent" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
