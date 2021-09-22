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
    const Cancel =   -1;
    const Waiting =   1;
    const Confirmed = 2;
    const Shipping = 3;
    const Done = 4;
}
