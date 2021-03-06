<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '39d38856ec24247352cc90ab75c55808',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        	'loginUrl' => ['/admin/user/login']
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
    		'enableStrictParsing' => false,
    		'rules' => [
    			'<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
    			'<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
    			'<controller:\w+>/<id:\d+>' => '<controller>/view',	            
	            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',    			
    			'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    			'<controller:\w+>/<action:\w+>/<url:.*>' => '<controller>/<action>',    			    			
    		],
    	],
    ],
    'params' => $params,
	'language' => 'vi-VN',
	'modules' => [
		'admin' => ['class' => 'app\modules\admin\Admin'],
	],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = ['class' => 'yii\debug\Module', 'allowedIPs' => ['127.0.0.1', '192.168.1.*']];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module', 'allowedIPs' => ['127.0.0.1', '192.168.1.*']];
}

return $config;
