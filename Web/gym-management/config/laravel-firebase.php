<?php

return [
    'read_only' => env('FIREBASEDB_READONLY',false),//DEBUG

    /**
     * Firebase service account information, can be either:
     * - string : absolute path to serviceaccount json file
     * - string : content of serviceaccount (json string)
     * - array : php array conversion of the serviceaccount
     * @var array|string
     */
    'service_account' => base_path('./FitAndFight-d18fd34bc5db.json'),

    /**
     * If set to true will enable Google OAuth2.0 token cache storage
     */
    'cache' => true,

    /**
     * Cache driver for OAuth token cache,
     * if null default cache driver will be used
     * @var string|null
     */
    'cache_driver' => null,

    /**
     * Specify if and what event to trigger if an invalid token is returned
     * @var string|null
     */
    'FCMInvalidTokenTriggerEvent' => null,
];
