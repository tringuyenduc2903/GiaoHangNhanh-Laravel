<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

trait Utility
{
    public function getTrackingUrl(
        string $order_code,
        ?string $tracking_url = null
    ): string {
        if (is_null($tracking_url)) {
            $tracking_url = config('giaohangnhanh-laravel.tracking_url');
        }

        return "$tracking_url?order_code=$order_code";
    }
}
