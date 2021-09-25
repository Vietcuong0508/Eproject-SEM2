<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CheckoutEnum extends Enum
{
    const PAID =   1;
    const UNPAID =   2;
}
