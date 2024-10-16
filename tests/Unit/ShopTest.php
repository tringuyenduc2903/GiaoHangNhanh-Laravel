<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('shops must be array', function () {
    $result = GiaoHangNhanh::getShops([
        'offset' => 1,
    ]);

    expect($result)->toBeArray();
});

test('shop must be numeric', function (
    string $ward_code,
    int $district_id,
) {
    $result = GiaoHangNhanh::createShop([
        'ward_code' => $ward_code,
        'district_id' => $district_id,
        'name' => vnfaker()->fullname(),
        'phone' => vnfaker()->mobilephone(),
        'address' => fake()->address,
    ]);

    expect($result)->toBeNumeric();
})->with('shop');
