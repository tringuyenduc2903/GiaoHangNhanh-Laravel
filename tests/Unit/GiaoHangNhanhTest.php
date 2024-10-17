<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('get tracking url must be string', function (string $order_code) {
    $result = GiaoHangNhanh::getTrackingUrl($order_code);

    expect($result)->toBeString();
})->with('order code');
