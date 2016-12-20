<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
    ],
    
    'as beforeRequest' => [  //if guest user access site so, redirect to login page.
    'class' => 'yii\filters\AccessControl',
    'rules' => [
        [
            'actions' => ['login', 'error'],
            'allow' => true,
        ],
        [
            'allow' => true,
            'roles' => ['@'],
        ],
    ],
],
    
    
    
    
    
    
    
    
    
    
    'modules' => [
     'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
    
    
      'debug' => [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1']
    ],
    ],
    
    'name'=>'Админ часть Доминанта',
];
