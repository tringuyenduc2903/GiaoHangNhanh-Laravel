<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('get fee must be array', function (
    int $service_type_id,
    string $to_name,
    string $to_phone,
    string $to_address,
    string $to_ward_code,
    int $to_district_id,
    int $weight,
    int $insurance_value,
    int $payment_type_id,
    string $required_note,
    array $items,
) {
    $result = GiaoHangNhanh::getFee([
        'service_type_id' => $service_type_id,
        'to_ward_code' => $to_ward_code,
        'to_district_id' => $to_district_id,
        'weight' => $weight,
        'insurance_value' => $insurance_value,
        'items' => $items,
    ]);

    expect($result)->toBeArray();
})->with('order');

test('get soc must be array', function (string $order_code) {
    $result = GiaoHangNhanh::getSoc($order_code);

    expect($result)->toBeArray();
})->with('order code');

test('services must be array', function (int $from_district, int $to_district) {
    $result = GiaoHangNhanh::getServices([
        'from_district' => $from_district,
        'to_district' => $to_district,
    ]);

    expect($result)->toBeArray();
})->with('district id', 'district id');
