<?php

return [
    'base_url' => env(
        'GHN_BASE_URL',
        env('APP_ENV', 'local') === 'production'
            ? env('GHN_PROD_BASE_URL', 'https://online-gateway.ghn.vn')
            : env('GHN_DEV_BASE_URL', 'https://dev-online-gateway.ghn.vn')
    ),
    'tracking_url' => env(
        'GHN_TRACKING_URL',
        env('APP_ENV', 'local') === 'production'
            ? env('GHN_PROD_TRACKING_URL', 'https://donhang.ghn.vn')
            : env('GHN_DEV_TRACKING_URL', 'https://tracking.ghn.dev')
    ),
    'token' => env('GHN_TOKEN'),
    'shop_id' => env('GHN_SHOP_ID'),
    'shop_district_id' => env('GHN_SHOP_DISTRICT_ID'),
];
