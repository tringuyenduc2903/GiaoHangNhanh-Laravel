<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;

dataset(
    'order',
    /**
     * @throws RandomException
     */
    fn (): array => [[
        ServiceTypeId::HANG_NHE->value,
        vnfaker()->fullname(),
        vnfaker()->mobilephone(),
        fake()->address,
        '470610',
        3196,
        random_int(1, 19999),
        random_int(0, 5000000),
        fake()->randomElement(PaymentTypeId::values()),
        fake()->randomElement(RequiredNote::values()),
        [[
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
        ]],
    ], [
        ServiceTypeId::HANG_NANG->value,
        vnfaker()->fullname(),
        vnfaker()->mobilephone(),
        fake()->address,
        '190814',
        1969,
        random_int(1, 19999),
        random_int(0, 5000000),
        fake()->randomElement(PaymentTypeId::values()),
        fake()->randomElement(RequiredNote::values()),
        [[
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
            'weight' => 10000,
            'length' => 50,
            'width' => 12,
            'height' => 23,
        ], [
            'name' => vnfaker()->fullname(),
            'quantity' => 1,
            'weight' => 11000,
            'length' => 64,
            'width' => 100,
            'height' => 36,
        ]],
    ]]
);

dataset('order code', [
    'LNY7CM',
    'LNY7CR',
]);

dataset('order code can update', [
    'LNY7CM',
    'LNY79Q',
]);

dataset('order code can cancel', [
    'LNY79L',
    'LNY79F',
]);

dataset('client order code', [
    'GHN-00001',
    'GHN-00002',
]);

dataset('leadtime', [[
    '470610',
    3196,
], [
    '190814',
    1969,
]]);
