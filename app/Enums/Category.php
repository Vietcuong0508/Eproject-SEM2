<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Category extends Enum
{
    const RAU =   1;
    const CỦ = 2;
    const QUẢ = 3;
}
