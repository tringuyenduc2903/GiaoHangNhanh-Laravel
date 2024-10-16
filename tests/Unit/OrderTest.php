<?php

use Random\RandomException;
use TriNguyenDuc\GiaoHangNhanh\Enums\PaymentTypeId;
use TriNguyenDuc\GiaoHangNhanh\Enums\RequiredNote;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceId;
use TriNguyenDuc\GiaoHangNhanh\Enums\ServiceTypeId;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('preview order must be array', function (
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
    $result = GiaoHangNhanh::previewOrder([
        'service_type_id' => $service_type_id,
        'to_name' => $to_name,
        'to_phone' => $to_phone,
        'to_address' => $to_address,
        'to_ward_code' => $to_ward_code,
        'to_district_id' => $to_district_id,
        'weight' => $weight,
        'insurance_value' => $insurance_value,
        'payment_type_id' => $payment_type_id,
        'required_note' => $required_note,
        'items' => $items,
    ]);

    expect($result)->toBeArray();
})->with('order');

test('create order must be array', function (
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
    $result = GiaoHangNhanh::createOrder([
        'service_type_id' => $service_type_id,
        'to_name' => $to_name,
        'to_phone' => $to_phone,
        'to_address' => $to_address,
        'to_ward_code' => $to_ward_code,
        'to_district_id' => $to_district_id,
        'weight' => $weight,
        'insurance_value' => $insurance_value,
        'payment_type_id' => $payment_type_id,
        'required_note' => $required_note,
        'items' => $items,
    ]);

    expect($result)->toBeArray();
})->with('order');

test('get order by order code must be array', function (string $order_code) {
    $result = GiaoHangNhanh::getOrderByOrderCode($order_code);

    expect($result)->toBeArray();
})->with('order code');

test('get order by client order code must be array', function (string $client_order_code) {
    $result = GiaoHangNhanh::getOrderByClientOrderCode($client_order_code);

    expect($result)->toBeArray();
})->with('client order code');

test(
    'update order must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        $result = GiaoHangNhanh::updateOrder([
            'order_code' => $order_code,
            'service_type_id' => ServiceTypeId::HANG_NHE->value,
            'to_name' => vnfaker()->fullname(),
            'to_phone' => vnfaker()->mobilephone(),
            'to_address' => fake()->address,
            'to_ward_code' => '470610',
            'to_district_id' => 3196,
            'weight' => random_int(1, 19999),
            'insurance_value' => random_int(0, 5000000),
            'payment_type_id' => fake()->randomElement(PaymentTypeId::values()),
            'required_note' => fake()->randomElement(RequiredNote::values()),
            'items' => [[
                'name' => vnfaker()->fullname(),
                'quantity' => 1,
            ]],
        ]);

        expect($result)->toBeNull();
    }
)->with('order code can update');

test(
    'update cod order must be null',
    /**
     * @throws RandomException
     */
    function (string $order_code) {
        $result = GiaoHangNhanh::updateCodOrder([
            'order_code' => $order_code,
            'cod_amount' => random_int(0, 5000000),
        ]);

        expect($result)->toBeNull();
    }
)->with('order code');

test('return orders must be array', function (string $order_code) {
    $result = GiaoHangNhanh::returnOrders([$order_code]);

    expect($result)->toBeArray();
})->with('order code');

test('cancel orders must be array', function (string $order_code) {
    $result = GiaoHangNhanh::cancelOrders([$order_code]);

    expect($result)->toBeArray();
})->with('order code can cancel');

test('storing orders must be array', function (string $order_code) {
    $result = GiaoHangNhanh::storingOrders([$order_code]);

    expect($result)->toBeArray();
})->with('order code');

test('print orders must be array', function (string $order_code) {
    $result = GiaoHangNhanh::printOrders([$order_code]);

    expect($result)->toBeArray();
})->with('order code');

test('leadtime must be array', function (
    string $to_ward_code,
    int $to_district_id,
    int $service_id,
) {
    $result = GiaoHangNhanh::getLeadTime([
        'to_ward_code' => $to_ward_code,
        'to_district_id' => $to_district_id,
        'service_id' => $service_id,
    ]);

    expect($result)->toBeArray();
})->with('leadtime', ServiceId::values());

test('shift date must be array', function () {
    $result = GiaoHangNhanh::getShiftDate();

    expect($result)->toBeArray();
});

/**
 * TODO: Wait for GHN support to get Captcha
 * test('stations must be array', function (int $district_id) {
 * $result = GiaoHangNhanh::getStations(
 * [
 * 'district_id' => (string) $district_id,
 * ],
 * ''
 * );
 *
 * expect($result)->toBeArray();
 * })->with('district id');
 */
