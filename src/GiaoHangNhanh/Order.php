<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use TriNguyenDuc\GiaoHangNhanh\Validates\OrderData;

trait Order
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function previewOrder(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/preview',
                OrderData::createOrder($data)
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
    public function createOrder(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/create',
                OrderData::createOrder($data)
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
    public function getOrderByOrderCode(
        string $order_code,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/shipping-order/detail', [
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
    public function getOrderByClientOrderCode(
        string $client_order_code,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/shipping-order/detail-by-client-code', [
                'client_order_code' => $client_order_code,
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
    public function updateOrder(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/update',
                OrderData::updateOrder($data)
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
    public function updateCodOrder(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/updateCOD',
                OrderData::updateCodOrder($data)
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
     * @param  array<string>  $order_codes
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function returnOrders(
        array $order_codes,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/return', [
                'order_codes' => $order_codes,
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
     * @param  array<string>  $order_codes
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function cancelOrders(
        array $order_codes,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/cancel', [
                'order_codes' => $order_codes,
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
     * @param  array<string>  $order_codes
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function storingOrders(
        array $order_codes,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post('shiip/public-api/v2/switch-status/storing', [
                'order_codes' => $order_codes,
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
     * @param  array<string>  $order_codes
     *
     * @throws ConnectionException
     * @throws Exception
     */
    public function printOrders(
        array $order_codes,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        if (is_null($base_url)) {
            $base_url = config('giaohangnhanh-laravel.base_url');
        }

        if (is_null($token)) {
            $token = config('giaohangnhanh-laravel.token');
        }

        $response = Http::baseUrl($base_url)
            ->withHeader('token', $token)
            ->accept('application/json')
            ->post('shiip/public-api/v2/a5/gen-token', [
                'order_codes' => $order_codes,
            ]);

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        $data_token = $response->json('data.token');

        return [
            'A5' => "$base_url/a5/public-api/printA5?token=$data_token",
            '80x80' => "$base_url/a5/public-api/print80x80?token=$data_token",
            '52x70' => "$base_url/a5/public-api/print52x70?token=$data_token",
        ];
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getLeadTime(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/v2/shipping-order/leadtime',
                OrderData::getLeadTime($data)
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
    public function getShiftDate(
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->post('shiip/public-api/v2/shift/date');

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
    public function getStations(
        array $data,
        string $captcha,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->withHeader('captcha', $captcha)
            ->post(
                'shiip/public-api/v2/station/get',
                OrderData::getStations($data)
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
