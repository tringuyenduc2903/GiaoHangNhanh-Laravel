<?php

namespace TriNguyenDuc\GiaoHangNhanh;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Address;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Fee;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Order;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Shop;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Ticket;

class GiaoHangNhanh
{
    use Address;
    use Fee;
    use Order;
    use Shop;
    use Ticket;

    protected function getRequest(
        ?string $base_url = null,
        ?string $token = null,
        null|int|bool $shop_id = false
    ): PendingRequest {
        if (is_null($base_url)) {
            $base_url = config('giaohangnhanh-laravel.base_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh-laravel.token');
        }

        if (is_null($shop_id)) {
            $shop_id = config('giaohangnhanh-laravel.shop_id');
        }

        $request = Http::baseUrl($base_url)
            ->withHeader('token', $token)
            ->accept('application/json');

        if (is_int($shop_id)) {
            $request->withHeader('shop_id', $shop_id);
        }

        return $request;
    }
}
