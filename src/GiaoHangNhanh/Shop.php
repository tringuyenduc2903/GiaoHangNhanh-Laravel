<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use TriNguyenDuc\GiaoHangNhanh\Validates\ShopData;

trait Shop
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getShops(
        array $data,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->post(
                'shiip/public-api/v2/shop/all',
                ShopData::getShops($data)
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
    public function createShop(
        array $data,
        ?string $base_url = null,
        ?string $token = null
    ): int {
        $response = $this
            ->getRequest($base_url, $token)
            ->post(
                'shiip/public-api/v2/shop/register',
                ShopData::createShop($data)
            );

        if ($response->failed()) {
            throw new Exception(
                $response->json('message'),
                $response->json('code')
            );
        }

        return $response->json('data.shop_id');
    }
}
