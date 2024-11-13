<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('getProvince must be array', function () {
    expect(GiaoHangNhanh::getProvince())->toBeArray();
});

test('getDistrict must be array', function (int $province_id) {
    expect(GiaoHangNhanh::getDistrict($province_id))->toBeArray();
})->with('province id');

test('getWard must be null or array', function (int $district_id) {
    $result = GiaoHangNhanh::getWard($district_id);

    expect(is_null($result) || is_array($result))->toBeTrue();
})->with('district id');
