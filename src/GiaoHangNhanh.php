<?php

namespace TriNguyenDuc\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Address;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\CalculateFee;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Order;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Store;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Ticket;
use TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh\Utility;

class GiaoHangNhanh
{
    use Address;
    use CalculateFee;
    use Order;
    use Store;
    use Ticket;
    use Utility;

    protected function getRequest(
        ?int $shop_id,
        ?string $api_url,
        ?string $token
    ): PendingRequest {
        return Http::baseUrl($api_url ?: config('giaohangnhanh-laravel.api_url'))
            ->withHeaders([
                'token' => $token ?: config('giaohangnhanh-laravel.token'),
                'shop_id' => $shop_id ?: config('giaohangnhanh-laravel.shop_id'),
            ])
            ->acceptJson();
    }

    /**
     * @throws Exception
     */
    protected function handleFailedResponse(Response $response): void
    {
        if ($response->successful()) {
            return;
        }

        Log::debug(
            'GiaoHangNhanh API Error',
            $response->json()
        );

        throw new Exception(
            $response->json('message'),
            $response->json('code')
        );
    }
}
