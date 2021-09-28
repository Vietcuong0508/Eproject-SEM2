<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Contact extends Enum
{
    const Chờ_Phản_Hồi =   1;
    const Đã_Phản_Hồi = 2;
}
