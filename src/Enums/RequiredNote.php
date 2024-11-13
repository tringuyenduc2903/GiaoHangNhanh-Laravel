<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Required Note enum.
 *
 * @method static self CHO_THU_HANG()
 * @method static self CHO_XEM_HANG_KHONG_THU()
 * @method static self KHONG_CHO_XEM_HANG()
 */
class RequiredNote extends Enum
{
    const CHO_THU_HANG = 'CHOTHUHANG';

    const CHO_XEM_HANG_KHONG_THU = 'CHOXEMHANGKHONGTHU';

    const KHONG_CHO_XEM_HANG = 'KHONGCHOXEMHANG';
}
