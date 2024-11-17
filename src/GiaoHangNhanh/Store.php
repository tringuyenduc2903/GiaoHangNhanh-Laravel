<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Store
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createStore(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): int {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shop/register', $data);

        $this->handleFailedResponse($response);

        return $response->json('data.shop_id');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getStore(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/v2/shop/all', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
