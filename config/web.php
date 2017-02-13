<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'CIMS',
    'name' => 'CIMS',
    'language' => 'en',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
//    'defaultRoute' => 'user/login',
    'timezone' => 'Asia/Kuala_Lumpur',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'dW8ZbtSUTvujTaezwIfd9UZriJFf7TNr',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
//            'errorAction' => 'site/error',
            'errorAction' => 'site/fault',
        ],
        'user' => [
            'class' => 'app\modules\user\components\User',
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['user/login']
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'ebm.upm@gmail.com',
                'password' => 'Admin#2016',
                'port' => 587,
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['ebm.upm@gmail.com' => 'Computer Inventory Management System'],
                'charset' => 'UTF-8',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'formatter' => [
            'dateFormat' => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y, h:i A',
            'timeFormat' => 'php:h:i A',
            'locale' => 'en',
            'defaultTimeZone' => 'Asia/Kuala_Lumpur',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => ['app' => 'app.php'],
                ],
                'model' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'fileMap' => ['model' => 'model.php'],
                ],
            ],
        ]
    ],
    'modules' => [
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1'],
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator'
            ]
        ],
    ];
}

return $config;
