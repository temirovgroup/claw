<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
            'class' => 'yii\web\Session',
            'cookieParams' => ['httponly' => true, 'lifetime' => 60 * 60 * 30],
            'timeout' => 60 * 60 * 30,
            'useCookies' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'normalizeTrailingSlash' => true,
                'collapseSlashes' => true,
            ],
            'rules' => [
                /*[
                    'pattern' => 'noty/default/index',
                    'route' => 'noty/default/index',
                    'suffix' => '',
                ],*/
                [
                    'pattern' => '',
                    'route' => 'site/index',
                    'suffix' => '',
                ],
                [
                    'pattern' => 'sitemap',
                    'route' => 'sitemap/index',
                    'suffix' => '.xml',
                ],
                [
                    'pattern' => 'images/<item:[\w_\-\.]+>/<dirtyAlias:[\w_\-\.]+>',
                    'route' => 'yii2images/images/image-by-item-and-alias',
                    'suffix' => '',
                    'defaults' => ['item' => ''],
                ],
                [
                    'pattern' => 'cart',
                    'route' => 'cart/index',
                    'suffix' => '',
                ],
                [
                    'pattern' => 'cart/thanks/<id:[\w_\-\s]+>/<uin:[\w_\-\s]+>',
                    'route' => 'cart/thanks',
                    'suffix' => '',
                ],
                [
                    'pattern' => 'cart/<action:\w+>',
                    'route' => 'cart/<action>',
                    'suffix' => '',
                ],
                [
                    'pattern' => '<category_url:[\w_\-\.]+>/<product_url:[\w_\-\.]+>',
                    'route' => 'site/product',
                    'suffix' => '',
                ],
                /*[
                    'pattern' => '<category_url:[\w_\-\s]+>/<product_url:[\w_\-\s]+>/<order_id:\d+>/<uin:\d+>',
                    'route' => 'catalog/product',
                    'suffix' => '',
                    'defaults' => [
                        'order_id' => '',
                        'uin' => '',
                    ],
                ],*/
                [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                    'suffix' => '',
                ],
                [
                    'pattern' => '<module>/<controller>/<action>',
                    'route' => '<module>/<controller>/<action>',
                    'suffix' => '',
                ],
            ],
        ],
    ],
    'params' => $params,
];
