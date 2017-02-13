<div class="sidebar">
    <div class="brand">
        <a href="index.html">
            <img src="<?= $directoryWeb ?>/img/logo.png" alt="Klorofil Logo" class="img-responsive logo">
        </a>
    </div>
    <div class="sidebar-scroll">
        <?php
        $currentRoute = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        echo \yii\bootstrap\Nav::widget([
            'items' => [
                [
                    'label' => 'Dashboard',
                    'url' => ['site/index'],
                    'linkOptions' => ['class' => ($currentRoute == 'site/index') ? 'active' : '']
                ],
                [
                    'label' => 'Elements',
                    'url' => ['demo/elements'],
                    'linkOptions' => ['class' => ($currentRoute == 'demo/elements') ? 'active' : '']
                ],
                [
                    'label' => 'Charts',
                    'url' => ['demo/charts'],
                    'linkOptions' => ['class' => ($currentRoute == 'demo/charts') ? 'active' : '']
                ],
                [
                    'label' => 'Panels',
                    'url' => ['demo/panels'],
                    'linkOptions' => ['class' => ($currentRoute == 'demo/panels') ? 'active' : '']
                ],
                [
                    'label' => 'Notifications',
                    'url' => ['demo/notifications'],
                    'linkOptions' => ['class' => ($currentRoute == 'demo/notifications') ? 'active' : '']
                ]
            ]
        ]);
        ?>
    </div>
</div>