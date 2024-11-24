<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test(
    'previewOrder must be array',
    /**
     * @throws RandomException
     */
    function (
        int $service_type_id,
        int $payment_type_id,
        string $required_note,
        string $client_order_code,
        string $to_ward_code,
        int $to_district_id
    ) {
        switch ($service_type_id) {
            case ServiceTypeId::HANG_NHE:
                $weight = random_int(1, 19999);

                $items = [[
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                ]];
                break;
            case ServiceTypeId::HANG_NANG:
            default:
                $weight = random_int(20000, 50000);

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

        expect(GiaoHangNhanh::previewOrder([
            'service_type_id' => $service_type_id,
            'to_name' => vnfaker()->fullname(),
            'to_phone' => vnfaker()->mobilephone(),
            'to_address' => fake()->address,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'client_order_code' => $client_order_code,
            'weight' => $weight,
            'insurance_value' => random_int(0, 5000000),
            'payment_type_id' => $payment_type_id,
            'required_note' => $required_note,
            'items' => $items,
        ]))->toBeArray()->dump();
    }
)->with(
    ServiceTypeId::keys(),
    PaymentTypeId::keys(),
    RequiredNote::keys(),
    'client order code',
    'address'
);

test(
    'createOrder must be array',
    /**
     * @throws RandomException
     */
    function (
        int $service_type_id,
        int $payment_type_id,
        string $required_note,
        string $client_order_code,
        string $to_ward_code,
        int $to_district_id
    ) {
        switch ($service_type_id) {
            case ServiceTypeId::HANG_NHE:
                $weight = random_int(1, 19999);

                $items = [[
                    'name' => vnfaker()->fullname(),
                    'quantity' => 1,
                ]];
                break;
            case ServiceTypeId::HANG_NANG:
            default:
                $weight = random_int(20000, 50000);

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

        expect(GiaoHangNhanh::createOrder([
            'service_type_id' => $service_type_id,
            'to_name' => vnfaker()->fullname(),
            'to_phone' => vnfaker()->mobilephone(),
            'to_address' => fake()->address,
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'client_order_code' => $client_order_code,
            'weight' => $weight,
            'insurance_value' => random_int(0, 5000000),
            'payment_type_id' => $payment_type_id,
            'required_note' => $required_note,
            'items' => $items,
        ]))->toBeArray()->dump();
    }
)->with(
    ServiceTypeId::keys(),
    PaymentTypeId::keys(),
    RequiredNote::keys(),
    'client order code',
    'address'
);

test('updateOrder must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        expect(GiaoHangNhanh::updateOrder([
            'order_code' => $order_code,
            'to_name' => vnfaker()->fullname(),
            'to_phone' => vnfaker()->mobilephone(),
            'to_address' => fake()->address,
            'to_ward_code' => '470610',
            'to_district_id' => 3152,
            'weight' => random_int(1, 19999),
            'insurance_value' => random_int(0, 5000000),
            'payment_type_id' => fake()->randomElement(PaymentTypeId::keys()),
            'required_note' => fake()->randomElement(RequiredNote::keys()),
            'items' => [[
                'name' => vnfaker()->fullname(),
                'quantity' => 1,
                'weight' => random_int(1, 19999),
            ]],
        ]))->toBeNull()->dump();
    }
)->with('order code');

test('updateCodOrder must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        expect(GiaoHangNhanh::updateCodOrder([
            'order_code' => $order_code,
            'cod_amount' => random_int(0, 5000000),
        ]))->toBeNull()->dump();
    }
)->with('order code');

test('orderInfo must be array', function (string $order_code) {
    expect(GiaoHangNhanh::orderInfo($order_code))->toBeArray()->dump();
})->with('order code');

test('orderInfoByClientOrderCode must be array', function (string $order_code) {
    if (! $order_code) {
        return;
    }

    expect(GiaoHangNhanh::orderInfoByClientOrderCode($order_code))->toBeArray()->dump();
})->with('client order code');

test('returnOrder must be array', function (string $order_code) {
    expect(GiaoHangNhanh::returnOrder([$order_code]))->toBeArray()->dump();
})->with('order code');

test('deliveryAgain must be array', function (string $order_code) {
    expect(GiaoHangNhanh::deliveryAgain([$order_code]))->toBeArray()->dump();
})->with('order code');

test('printOrder must be array', function (string $order_code) {
    expect(GiaoHangNhanh::printOrder([$order_code]))->toBeArray()->dump();
})->with('order code');

test('cancelOrder must be array', function (string $order_code) {
    expect(GiaoHangNhanh::cancelOrder([$order_code]))->toBeArray()->dump();
})->with('order code cancel');

test('getStation must be array', function (
    string $captcha,
    int $district_id
) {
    expect(GiaoHangNhanh::getStation(
        ['district_id' => (string) $district_id],
        $captcha
    ))->toBeArray()->dump();
})->with('captcha', 'district id');

test('calculateExpectedDeliveryTime must be array', function (
    int $from_district_id,
    string $to_ward_code,
    int $to_district_id
) {
    $services = GiaoHangNhanh::getService([
        'from_district' => $from_district_id,
        'to_district' => $to_district_id,
    ]);

    foreach ($services as $service) {
        expect(GiaoHangNhanh::calculateExpectedDeliveryTime([
            'to_ward_code' => $to_ward_code,
            'to_district_id' => $to_district_id,
            'service_id' => $service['service_id'],
        ]))->toBeArray()->dump();
    }
})->with('district id', 'address');

test('pickShift must be array', function () {
    expect(GiaoHangNhanh::pickShift())->toBeArray()->dump();
});
