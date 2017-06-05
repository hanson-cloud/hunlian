<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'mem' => [
            'class'=>'yii\caching\MemCache',
            'servers' => [
                [
                    'host' => '59.110.142.51',
                    'port' => 11211,
//                    'weight' => 60,
                ],
            ],
        ],
    ],
];
