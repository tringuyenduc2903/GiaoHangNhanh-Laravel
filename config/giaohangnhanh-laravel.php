<?php

return [
    // For Dev:  https://dev-online-gateway.ghn.vn
    // For Prod: https://online-gateway.ghn.vn
    'api_url' => env('GHN_API_URL', 'https://online-gateway.ghn.vn'),

    // For Dev:  https://tracking.ghn.dev
    // For Prod: https://donhang.ghn.vn
    'tracking_url' => env('GHN_TRACKING_URL', 'https://donhang.ghn.vn'),

    // For Dev:  https://5sao.ghn.dev
    // For Prod: https://khachhang.ghn.vn
    'token' => env('GHN_TOKEN'),
    'shop_id' => env('GHN_SHOP_ID'),
];
