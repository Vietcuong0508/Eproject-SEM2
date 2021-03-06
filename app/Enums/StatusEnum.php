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
    const Đã_Xác_Nhận = 2;
    const Đang_Giao_Hàng = 3;
    const Hoàn_Thành = 4;
}
