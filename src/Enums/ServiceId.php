<?php

namespace TriNguyenDuc\GiaoHangNhanh\Enums;

enum ServiceId: int
{
    case HANG_NHE = 53321;

    case HANG_NANG = 100039;

    public static function values(): array
    {
        return [
            self::HANG_NHE->name => self::HANG_NHE->value,
            self::HANG_NANG->name => self::HANG_NANG->value,
        ];
    }
}
