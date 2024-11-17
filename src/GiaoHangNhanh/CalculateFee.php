<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait CalculateFee
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function calculateFee(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/fee', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function feeOrderInfo(
        string $order_code,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/soc', [
                'order_code' => $order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getService(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): ?array {
        $data['shop_id'] = $shop_id ?: config('giaohangnhanh-laravel.shop_id');

        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/available-services', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
