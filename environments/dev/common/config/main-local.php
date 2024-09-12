<?php
if (YII_ENV === 'prod') {
    $params = require __DIR__ . '/params.php';
} else {
    $params = require __DIR__ . '/params-local.php';
}

return [
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=172.18.0.1;dbname=yii2advanced',
            'username' => 'yii2advanced',
            'password' => 'secret',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@common/mail',
            // send all mails to a file by default.
            'useFileTransport' => false,
            // You have to set
            //
            // 'useFileTransport' => false,
            //
            // and configure a transport for the mailer to send real emails.
            //
            // SMTP server example:
            'transport' => [
                'scheme' => 'smtps',
                'host' => $params['mailer']['host'],
                'username' => $params['mailer']['email'],
                'password' => $params['mailer']['pass'],
                'port' => 465,
            ],
            //
            // DSN example:
                /*'transport' => [
                    'dsn' => "smtps://{$params['mailer']['email']}:{$params['mailer']['pass']}@{$params['mailer']['host']}:465",
                ],*/
            //
            // See: https://symfony.com/doc/current/mailer.html#using-built-in-transports
            // Or if you use a 3rd party service, see:
            // https://symfony.com/doc/current/mailer.html#using-a-3rd-party-transport
        ],
    ],
];
