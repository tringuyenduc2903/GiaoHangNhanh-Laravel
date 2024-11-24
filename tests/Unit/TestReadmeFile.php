<?php

use TriNguyenDuc\GiaoHangNhanh\Enums\OrderReason;
use TriNguyenDuc\GiaoHangNhanh\Enums\OrderStatus;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('1 must be array', function () {
    expect(GiaoHangNhanh::getProvince())->toBeArray()->dump();
});

test('2 must be array', function () {
    expect(GiaoHangNhanh::getDistrict(269))->toBeArray()->dump();
});

test('3 must be null or array', function () {
    expect(GiaoHangNhanh::getWard(2264))->toBeArray()->dump();
});

test('4 must be array', function () {
    expect(GiaoHangNhanh::calculateFee([
        'service_type_id' => 5,
        'from_ward_code' => '21211',
        'from_district_id' => 1454,
        'to_ward_code' => '21012',
        'to_district_id' => 1452,
        'height' => 20,
        'length' => 30,
        'weight' => 3000,
        'width' => 40,
        'insurance_value' => 0,
        'coupon' => null,
        'items' => [[
            'name' => 'TEST1',
            'quantity' => 1,
            'height' => 200,
            'weight' => 1000,
            'length' => 200,
            'width' => 200,
        ]],
    ]))->toBeArray()->dump();
});

test('5 must be array', function () {
    expect(GiaoHangNhanh::feeOrderInfo('G8ADKBRF'))->toBeArray()->dump();
});

test('6 must be array', function () {
    expect(GiaoHangNhanh::getService([
        'from_district' => 1490,
        'to_district' => 1442,
    ]))->toBeArray()->dump();
});

test('7 must be array', function () {
    expect(GiaoHangNhanh::previewOrder([
        'payment_type_id' => 2,
        'note' => 'Tintest 123',
        'required_note' => 'KHONGCHOXEMHANG',
        'return_phone' => '0332190458',
        'return_address' => '39 NTT',
        'return_district_id' => null,
        'return_ward_code' => '',
        'client_order_code' => '',
        'to_name' => 'TinTest124',
        'to_phone' => '0987654321',
        'to_address' => '72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam',
        'to_ward_code' => '20107',
        'to_district_id' => 1442,
        'cod_amount' => 200000,
        'content' => 'ABCDEF',
        'weight' => 200,
        'length' => 15,
        'width' => 15,
        'height' => 15,
        'pick_station_id' => 0,
        'insurance_value' => 2000000,
        'service_id' => 0,
        'service_type_id' => 2,
        'coupon' => null,
        'pick_shift' => [2],
        'items' => [[
            'name' => 'Áo Polo',
            'code' => 'Polo123',
            'quantity' => 1,
            'price' => 200000,
            'length' => 12,
            'width' => 12,
            'height' => 12,
            'category' => [
                'level1' => 'Áo',
            ],
        ]],
    ]))->toBeArray()->dump();
});

test('8 must be array', function () {
    expect(GiaoHangNhanh::createOrder([
        'payment_type_id' => 2,
        'note' => 'Tintest 123',
        'required_note' => 'KHONGCHOXEMHANG',
        'return_phone' => '0332190458',
        'return_address' => '39 NTT',
        'return_district_id' => null,
        'return_ward_code' => '',
        'client_order_code' => '',
        'to_name' => 'TinTest124',
        'to_phone' => '0987654321',
        'to_address' => '72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam',
        'to_ward_code' => '20107',
        'to_district_id' => 1442,
        'cod_amount' => 200000,
        'content' => 'ABCDEF',
        'weight' => 200,
        'length' => 15,
        'width' => 15,
        'height' => 15,
        'pick_station_id' => 0,
        'insurance_value' => 2000000,
        'service_id' => 0,
        'service_type_id' => 2,
        'coupon' => null,
        'pick_shift' => [2],
        'items' => [[
            'name' => 'Áo Polo',
            'code' => 'Polo123',
            'quantity' => 1,
            'price' => 200000,
            'length' => 12,
            'width' => 12,
            'height' => 12,
            'category' => [
                'level1' => 'Áo',
            ],
        ]],
    ]))->toBeArray()->dump();
});

test('9 must be null', function () {
    expect(GiaoHangNhanh::updateOrder([
        'order_code' => 'G8ADKBRF',
        'note' => 'nhớ gọi 30p khi giao',
    ]))->toBeNull()->dump();
});

test('10 must be null', function () {
    expect(GiaoHangNhanh::updateCodOrder([
        'order_code' => 'G8ADKBRF',
        'cod_amount' => 100000,
    ]))->toBeNull()->dump();
});

test('11 must be array', function () {
    expect(GiaoHangNhanh::orderInfo('G8ADKBRF'))->toBeArray()->dump();
});

test('12 must be array', function () {
    expect(GiaoHangNhanh::orderInfoByClientOrderCode('SHOP-1'))->toBeArray()->dump();
});

test('13 must be array', function () {
    expect(GiaoHangNhanh::returnOrder(['G8ADKBRF']))->toBeArray()->dump();
});

test('14 must be array', function () {
    expect(GiaoHangNhanh::deliveryAgain(['G8ADKBRF']))->toBeArray()->dump();
});

test('15 must be array', function () {
    expect(GiaoHangNhanh::printOrder(['G8ADKBRF']))->toBeArray()->dump();
});

test('16 must be array', function () {
    expect(GiaoHangNhanh::cancelOrder(['G8ADKBYD']))->toBeArray()->dump();
});

test('17 must be array', function () {
    expect(GiaoHangNhanh::getStation(
        [
            'district_id' => '1490',
            'offset' => 0,
            'limit' => 1000,
        ],
        'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3MzI0MzQ3MzJ9.2ShiA7wJSodHo7cKHx6y2gZNBaFdY660v25ChTiz1eg'
    ))->toBeArray()->dump();
});

test('18 must be array', function () {
    expect(GiaoHangNhanh::calculateExpectedDeliveryTime([
        'from_ward_code' => '21211',
        'from_district_id' => 1454,
        'to_ward_code' => '21012',
        'to_district_id' => 1452,
        'service_id' => 53320,
    ]))->toBeArray()->dump();
});

test('19 must be array', function () {
    expect(GiaoHangNhanh::pickShift())->toBeArray()->dump();
});

test('20 must be numeric', function () {
    expect(GiaoHangNhanh::createStore([
        'ward_code' => '21211',
        'district_id' => 1454,
        'name' => 'Tin1123',
        'phone' => '0982213854',
        'address' => '35 dd p12 qtb',
    ]))->toBeNumeric()->dump();
});

test('21 must be array', function () {
    expect(GiaoHangNhanh::getStore([
        'offset' => 0,
        'limit' => 1000,
    ]))->toBeArray()->dump();
});

test('22 must be array', function () {
    expect(GiaoHangNhanh::createTicket([
        'c_email' => 'cskh@ghn.vn',
        'order_code' => 'G8ADKBRF',
        'category' => 'Tư vấn',
        'description' => 'Tạo yêu cầu test',
    ]))->toBeArray()->dump();
});

test('23 must be array', function () {
    expect(GiaoHangNhanh::createFeedbackTicket([
        'ticket_id' => 26955201,
        'description' => 'Tạo yêu cầu test',
    ]))->toBeArray()->dump();
});

test('24 must be null or array', function () {
    expect(GiaoHangNhanh::getTicketList([
        'offset' => 0,
        'limit' => 1000,
    ]))->toBeArray()->dump();
});

test('25 must be array', function () {
    expect(GiaoHangNhanh::getTicket(26955201))->toBeArray()->dump();
});

test('26 must be string', function () {
    expect(GiaoHangNhanh::getTrackingUrl('G8ADKBRF'))->toBeString()->dump();
});

test('27 must be array', function () {
    expect(OrderReason::values())->toBeArray()->dump();
});

test('28 must be array', function () {
    expect(OrderStatus::values())->toBeArray()->dump();
});
