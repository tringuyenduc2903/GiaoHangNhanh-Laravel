<?php

use TriNguyenDuc\GiaoHangNhanh\Enums\TicketCategory;
use TriNguyenDuc\GiaoHangNhanh\Facades\GiaoHangNhanh;

test('get tickets must be null or array', function () {
    $result = GiaoHangNhanh::getTickets([
        'offset' => 1,
    ]);

    expect(is_null($result) || is_array($result))->toBeTrue();
});

test('get ticket must be array', function (int $ticket_id) {
    $result = GiaoHangNhanh::getTicket($ticket_id);

    expect($result)->toBeArray();
})->with('ticket id');

test('create ticket must be array', function (
    string $order_code,
    string $category,
) {
    $result = GiaoHangNhanh::createTicket([
        'order_code' => $order_code,
        'category' => $category,
        'description' => 'Test',
        'c_email' => vnfaker()->email(['gmail.com']),
    ]);

    expect($result)->toBeArray();
})->with('order code', TicketCategory::values());

test('reply ticket must be array', function (int $ticket_id) {
    $result = GiaoHangNhanh::replyTicket([
        'ticket_id' => $ticket_id,
        'description' => vnfaker()->paragraphs(),
    ]);

    expect($result)->toBeArray();
})->with('ticket id');
