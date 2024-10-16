<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use TriNguyenDuc\GiaoHangNhanh\Validates\FeeData;

trait Fee
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getFee(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/fee',
                FeeData::getFee($data)
            );

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getSoc(
        string $order_code,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/shipping-order/soc', [
                'order_code' => $order_code,
            ]);

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getServices(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        if (is_null($base_url)) {
            $base_url = config('giaohangnhanh-laravel.base_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh-laravel.token');
        }

        if (is_null($shop_id)) {
            $shop_id = config('giaohangnhanh-laravel.shop_id');
        }

        $validate = FeeData::getServices($data);

        $validate['shop_id'] = (int) $shop_id;

        $response = Http::baseUrl($base_url)
            ->withHeader('token', $token)
            ->accept('application/json')
            ->post(
                'shiip/public-api/v2/shipping-order/available-services',
                $validate
            );

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data');
    }
}
