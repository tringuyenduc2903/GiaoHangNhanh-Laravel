<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Ticket Category enum.
 *
 * @method static self TU_VAN()
 * @method static self HOI_GIAO()
 * @method static self THAY_DOI_THONG_TIN()
 * @method static self KHIEU_NAI()
 */
class TicketCategory extends Enum
{
    const TU_VAN = 'Tư vấn';

    const HOI_GIAO = 'Hối Giao/Lấy/Trả hàng';

    const THAY_DOI_THONG_TIN = 'Thay đổi thông tin';

    const KHIEU_NAI = 'Khiếu nại';
}
