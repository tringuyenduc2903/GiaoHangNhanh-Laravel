<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('provinces must be array', function () {
    $result = GiaoHangNhanh::getProvinces();

    expect($result)->toBeArray();
});

test('districts must be array', function (int $province_id) {
    $result = GiaoHangNhanh::getDistrictsByProvinceId($province_id);

    expect($result)->toBeArray();
})->with('province id');

test('wards must be null or array', function (int $district_id) {
    $result = GiaoHangNhanh::getWardsByDistrictId($district_id);

    expect(is_null($result) || is_array($result))->toBeTrue();
})->with('district id');
