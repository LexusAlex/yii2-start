<?php

use yii\web\Response;

return [
    'id' => 'api',
    'basePath' => dirname(__DIR__).'/src',
    'bootstrap' => [
          [
             'class' => 'yii\filters\ContentNegotiator',
              'formats' => [
                  'application/json' => Response::FORMAT_JSON,
              ],
         ],
    ],
    'defaultRoute' => 'default/default',
    'components' => [
        'request' => [
            'cookieValidationKey' => '123',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            //'loginUrl' => ['default/default/login']
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'modules' => [
        'default' => [
            'class' => 'app\modules\default\Module',
        ],
    ],
];