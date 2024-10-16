<?php

namespace TriNguyenDuc\GiaoHangNhanh\GiaoHangNhanh;

use Exception;
use Illuminate\Http\Client\ConnectionException;
use TriNguyenDuc\GiaoHangNhanh\Validates\TicketData;

trait Ticket
{
    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getTickets(
        array $data,
        ?int $shop_id = null,
        ?string $base_url = null,
        ?string $token = null
    ): ?array {
        $response = $this
            ->getRequest($base_url, $token, $shop_id)
            ->post(
                'shiip/public-api/ticket/index',
                TicketData::getTickets($data)
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
    public function getTicket(
        int $ticket_id,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->post('shiip/public-api/ticket/detail', [
                'ticket_id' => $ticket_id,
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
    public function createTicket(
        array $data,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->asForm()
            ->post(
                'shiip/public-api/ticket/create',
                TicketData::createTicket($data)
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
    public function replyTicket(
        array $data,
        ?string $base_url = null,
        ?string $token = null
    ): array {
        $response = $this
            ->getRequest($base_url, $token)
            ->asForm()
            ->post(
                'shiip/public-api/ticket/reply',
                TicketData::replyTicket($data)
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
