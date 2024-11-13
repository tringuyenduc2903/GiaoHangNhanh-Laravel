<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Address
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getProvince(
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/master-data/province');

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getDistrict(
        int $province_id,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/master-data/district', [
                'province_id' => $province_id,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getWard(
        int $district_id,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): ?array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/master-data/ward', [
                'district_id' => $district_id,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
