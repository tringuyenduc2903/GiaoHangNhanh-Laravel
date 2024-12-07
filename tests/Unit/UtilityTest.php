<?php

use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('getTrackingUrl must be string', function (string $order_code) {
    expect(GiaoHangNhanh::getTrackingUrl($order_code))->toBeString()->dump();
})->with('order code');
