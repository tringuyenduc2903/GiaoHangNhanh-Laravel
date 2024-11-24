<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Order
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function previewOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/preview', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/create', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function updateOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/update', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function updateCodOrder(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): null {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/updateCOD', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function orderInfo(
        string $order_code,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/detail', [
                'order_code' => $order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function orderInfoByClientOrderCode(
        string $client_order_code,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/detail-by-client-code', [
                'client_order_code' => $client_order_code,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function returnOrder(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/switch-status/return', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function deliveryAgain(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/switch-status/storing', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function printOrder(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/a5/gen-token', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        $api_url = $api_url ?: config('giaohangnhanh-laravel.api_url');

        $print_token = $response->json('data.token');

        return [
            'A5' => "$api_url/a5/public-api/printA5?token=$print_token",
            '80x80' => "$api_url/a5/public-api/print80x80?token=$print_token",
            '52x70' => "$api_url/a5/public-api/print52x70?token=$print_token",
        ];
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function cancelOrder(
        array $order_codes,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ) {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/switch-status/cancel', [
                'order_codes' => $order_codes,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getStation(
        array $data,
        string $captcha,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->withHeader('captcha', $captcha)
            ->post('shiip/public-api/v2/station/get', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function calculateExpectedDeliveryTime(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shipping-order/leadtime', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function pickShift(
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shift/date');

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
