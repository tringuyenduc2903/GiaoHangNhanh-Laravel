<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Payment Type Id enum.
 *
 * @method static self NGUOI_BAN()
 * @method static self NGUOI_MUA()
 */
class PaymentTypeId extends Enum
{
    const NGUOI_BAN = 1;

    const NGUOI_MUA = 2;
}
