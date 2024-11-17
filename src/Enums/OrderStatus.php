<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Order Status enum.
 */
class OrderStatus extends Enum
{
    const READY_TO_PICK = 'ready_to_pick';

    const PICKING = 'picking';

    const MONEY_COLLECT_PICKING = 'money_collect_picking';

    const PICKED = 'picked';

    const STORING = 'storing';

    const TRANSPORTING = 'transporting';

    const SORTING = 'sorting';

    const DELIVERING = 'delivering';

    const DELIVERED = 'delivered';

    const MONEY_COLLECT_DELIVERING = 'money_collect_delivering';

    const DELIVERY_FAIL = 'delivery_fail';

    const WAITING_TO_RETURN = 'waiting_to_return';

    const RETURN = 'return';

    const RETURN_TRANSPORTING = 'return_transporting';

    const RETURN_SORTING = 'return_sorting';

    const RETURNING = 'returning';

    const RETURN_FAIL = 'return_fail';

    const RETURNED = 'returned';

    const CANCEL = 'cancel';

    const EXCEPTION = 'exception';

    const LOST = 'lost';

    const DAMAGE = 'damage';

    /**
     * Returns an array of $key => $value.
     * If an empty array is returned, the declared const keys will be used.
     */
    public static function map(): array
    {
        return [
            self::READY_TO_PICK => trans('Chờ lấy hàng'),
            self::PICKING => trans('Đang lấy hàng'),
            self::MONEY_COLLECT_PICKING => trans('Đang tương tác với người gửi'),
            self::PICKED => trans('Lấy hàng thành công'),
            self::STORING => trans('Nhập kho'),
            self::TRANSPORTING => trans('Đang trung chuyển'),
            self::SORTING => trans('Đang phân loại'),
            self::DELIVERING => trans('Đang giao hàng'),
            self::DELIVERED => trans('Giao hàng thành công'),
            self::MONEY_COLLECT_DELIVERING => trans('Đang tương tác với người nhận'),
            self::DELIVERY_FAIL => trans('Giao hàng không thành công'),
            self::WAITING_TO_RETURN => trans('Chờ xác nhận giao lại'),
            self::RETURN => trans('Chuyển hoàn'),
            self::RETURN_TRANSPORTING => trans('Đang trung chuyển hàng hoàn'),
            self::RETURN_SORTING => trans('Đang phân loại hàng hoàn'),
            self::RETURNING => trans('Đang hoàn hàng'),
            self::RETURN_FAIL => trans('Hoàn hàng không thành công'),
            self::RETURNED => trans('Hoàn hàng thành công'),
            self::CANCEL => trans('Đơn huỷ'),
            self::EXCEPTION => trans('Hàng ngoại lệ'),
            self::LOST => trans('Hàng thất lạc'),
            self::DAMAGE => trans('Hàng hư hỏng'),
        ];
    }
}
