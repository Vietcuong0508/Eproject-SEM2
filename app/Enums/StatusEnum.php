<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    const Hủy =   -1;
    const Chờ_Xác_Nhận =   1;
    const Xác_Nhận = 2;
    const Đang_Chuyển = 3;
    const Hoàn_Thành = 4;
}
