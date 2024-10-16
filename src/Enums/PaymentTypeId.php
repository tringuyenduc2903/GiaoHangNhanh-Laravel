<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum PaymentTypeId: int
{
    case NGUOI_BAN = 1;

    case NGUOI_MUA = 2;

    public static function values(): array
    {
        return [
            self::NGUOI_BAN->name => self::NGUOI_BAN->value,
            self::NGUOI_MUA->name => self::NGUOI_MUA->value,
        ];
    }
}
