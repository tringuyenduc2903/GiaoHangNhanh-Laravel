<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test(
    'calculateFee must be array',
    /**
     * @throws RandomException
     */
    function (
        int $service_type_id,
        string $to_ward_code,
        int $to_district_id
    ) {
        switch ($service_type_id) {
            case ServiceTypeId::HANG_NHE:
                $weight = random_int(1, 199) * 100;

                $items = [[
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                ]];
                break;
            case ServiceTypeId::HANG_NANG:
            default:
                $weight = random_int(2, 5) * 10000;

                $items = [[
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                    'weight' => 10000,
                    'length' => 50,
                    'width' => 12,
                    'height' => 23,
                ], [
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                    'weight' => $weight - 10000,
                    'length' => 64,
                    'width' => 100,
                    'height' => 36,
                ]];
                break;
        }

        expect(GiaoHangNhanh::calculateFee([
            'service_type_id' => $service_type_id,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'weight' => $weight,
            'insurance_value' => random_int(0, 5000) * 1000,
            'items' => $items,
        ]))->toBeArray()->dump();
    }
)->with(
    ServiceTypeId::keys(),
    'address'
);

test('feeOrderInfo must be array', function (string $order_code) {
    expect(GiaoHangNhanh::feeOrderInfo($order_code))->toBeArray()->dump();
})->with('order code');

test('getService must be null or array', function (
    int $from_district,
    int $to_district
) {
    dump($result = GiaoHangNhanh::getService([
        'from_district' => $from_district,
        'to_district' => $to_district,
    ]));

    expect(is_null($result) || is_array($result))->toBeTrue();
})->with('district id', 'district id');
