<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;

trait Ticket
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createTicket(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->asForm()
            ->post('shiip/public-api/ticket/create', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function createFeedbackTicket(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->asForm()
            ->post('shiip/public-api/ticket/reply', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getTicketList(
        array $data,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): ?array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/ticket/index', $data);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getTicket(
        int $ticket_id,
        ?int $shop_id = null,
        ?string $api_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($shop_id, $api_url, $token)
            ->post('shiip/public-api/ticket/detail', [
                'ticket_id' => $ticket_id,
            ]);

        $this->handleFailedResponse($response);

        return $response->json('data');
    }
}
