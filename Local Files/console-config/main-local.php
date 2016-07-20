<?php
return [
    'name' => 'Business Trainer Hub',
    'components' => [
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://localhost/businesstrainerhub/frontend/web/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => 'http://path/to/congig'
        ]
    ]
];
