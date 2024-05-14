<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Highest()
 * @method static static Limitted()
 */
final class Privilege extends Enum
{
    const Highest  = 1;
    const Limitted = 2;
}
