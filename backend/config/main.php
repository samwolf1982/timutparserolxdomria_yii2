<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
   'language' => 'ru-RU',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
    
    
   
    'i18n' => [
        'translations' => [
            'common*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
                //'sourceLanguage' => 'en-US',
             //   'fileMap' => [
//                    'app' => 'app.php',
//                    'app/error' => 'error.php',
//                ],
            ],
        ],
    ],
     'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@app/views/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'cookieValidationKey' => 'какая-то строка',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
  //  'as beforeRequest2' => [  //if guest user access site so, redirect to login page.
   // 'class' => 'yii\filters\AccessControl',
 //   'rules' => [
    //    [
      //      'actions' => ['login', 'error'],
     //       'allow' => true,
      //  ],
      //  [
      //      'allow' => true,
       //     'roles' => ['@'],
       // ],
   // ],
//],
    'params' => $params,
];
