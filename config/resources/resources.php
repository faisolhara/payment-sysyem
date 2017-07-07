<?php

return [
        'master' => [
            'Master\MasterUser' => ['view', 'insert', 'update'],
            'Master\MasterRole' => ['view', 'insert', 'update'],
            'Master\MasterHalte' => ['view', 'insert', 'update'],
            'Master\MasterCustomer' => ['view', 'insert', 'update'],
            'Master\MasterCity' => ['view', 'insert', 'update'],
            'Master\Setting' => ['view', 'update'],
        ],
        'transaction' => [
            'Transaction\TopUp' => ['view', 'insert', 'update', 'cancel'],
        ],
        'report' => [
            'Report\TransactionHistory' => ['view'],
        ],
    ];
    