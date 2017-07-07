<?php

return 
[
        [
            'label' => 'home',
            'icon' => 'home',
            'route' => '/',
        ],
        [
        'label' => 'master',
        'icon' => 'user',
        'children' =>
            [
                [
                    'label' => 'master-user',
                    'icon'  => 'user',
                    'route' => 'master/master-user',
                    'resource' => 'Master\MasterUser',
                    'privilege' => 'view',
                ],
                [
                    'label' => 'master-role',
                    'icon'  => 'user',
                    'route' => 'master/master-role',
                    'resource' => 'Master\MasterRole',
                    'privilege' => 'view',
                ],
                [
                    'label' => 'master-halte',
                    'icon'  => 'user',
                    'route' => 'master/master-halte',
                    'resource' => 'Master\MasterHalte',
                    'privilege' => 'view',
                ],
                [
                    'label' => 'master-customer',
                    'icon'  => 'user',
                    'route' => 'master/master-customer',
                    'resource' => 'Master\MasterCustomer',
                    'privilege' => 'view',
                ],
                [
                    'label' => 'master-city',
                    'icon'  => 'user',
                    'route' => 'master/master-city',
                    'resource' => 'Master\MasterCity',
                    'privilege' => 'view',
                ],
                [
                    'label' => 'setting',
                    'icon'  => 'user',
                    'route' => 'master/setting',
                    'resource' => 'Master\Setting',
                    'privilege' => 'view',
                ],
            ]
            
        ],
        [
        'label' => 'transaction',
        'icon' => 'exchange',
        'children' =>
            [
                [
                    'label' => 'top-up',
                    'icon'  => 'arrow-up',
                    'route' => 'transaction/top-up',
                    'resource' => 'Transaction\TopUp',
                    'privilege' => 'view',
                ],
            ]
        ],
        [
        'label' => 'report',
        'icon' => 'file-text',
        'children' =>
            [
                [
                    'label' => 'transaction-history',
                    'icon'  => 'files-o',
                    'route' => 'report/transaction-history',
                    'resource' => 'Report\TransactionHistory',
                    'privilege' => 'view',
                ],
            ]
        ],
    ];