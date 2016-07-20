<?php
return [
    'components' => [
        'log' => [
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'categories' => ['yii\web\HttpException:404'],
                    'levels' => ['error', 'warning'],
                ],
                'email' => [
                    'class' => 'yii\log\EmailTarget',
                    'except' => ['yii\web\HttpException:404'],
                    'levels' => ['error', 'warning'],
                    'message' => ['from' => 'DoNotReply@businesstrainerhub.com', 'to' => 'donnie@sixberries.com'],
                ],
            ],
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://localhost:27017/businesstrainerhub',
        ],
        'session' => [
            'class' => 'yii\mongodb\Session',
            'timeout' => '2592000',
        ],
        'solr' => [
            'class' => 'sammaye\solr\Client',
            'options' => [
                'endpoint' => [
                    'solr1' => [
                        'host' => '127.0.0.1',
                        'port' => '8984',
                        'path' => '/solr/businesstrainerhub'
                    ]
                ]
            ]
        ],
        /*'solr' => [
            'class' => 'sammaye\solr\Client',
            'options' => [
                'endpoint' => [
                    'solr1' => [
                        'host' => 'ec2-52-16-28-73.eu-west-1.compute.amazonaws.com',
                        'port' => '8983',
                        'path' => '/solr/businesstrainerhub_dev'
                    ]
                ]
            ]
        ],*/
        'mailer' => [
            'class' => 'common\components\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'email-smtp.eu-west-1.amazonaws.com',
                'username' => 'AKIAI43FTF6S5EPA7IPA', // ses-smtp-user.20150329-171320
                'password' => 'AvNHBdUqE7j+qkek7BeVS9J4Nwke64ujmkHtdfIJ/9hd',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'rules' => [
                // 'dashboard' => 'site/contact'
            ],
        ],
        'clientMail' => [
            'class' => 'roopz\imap\Imap',
            'connection' => [
                'imapPath' => '{imap.gmail.com:993/imap/ssl}INBOX',
                'imapLogin' => 'client@sixberries.com',
                'imapPassword' => 'client12345678901',
                'serverEncoding'=>' utf-8', // utf-8 default.
                'attachmentsDir'=>'/'
            ],
        ],
        'trainerMail' => [
            'class' => 'roopz\imap\Imap',
            'connection' => [
                'imapPath' => '{imap.gmail.com:993/imap/ssl}INBOX',
                'imapLogin' => 'trainer@sixberries.com',
                'imapPassword' => 'trainer1234567890',
                'serverEncoding'=>' utf-8', // utf-8 default.
                'attachmentsDir'=>'/'
            ],
        ],
        'pdf' => [
            'class' => \kartik\mpdf\Pdf::classname(),
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'mode'=>\kartik\mpdf\Pdf::MODE_UTF8,
            //'destination' => \kartik\mpdf\Pdf::FORMAT_A4,
            //'orientation'=>\kartik\mpdf\Pdf::ORIENT_LANDSCAPE,
            'marginLeft' => 'float',
            'marginRight' => 'float',
            // refer settings section for all configuration options
        ],
        'stripe' => [
            'class' => 'ruskid\stripe\Stripe',
            'publicKey' => "pk_test_CMm5n2FuUN1IQPLR3semaspg",
            'privateKey' => "sk_test_JQGYRkPq6NRw8hwwtMJt2mkA",
        ],
    ],
];
