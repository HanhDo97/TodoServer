<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static hasFullAccess()
 * @method static static OptionThree()
 */
final class Abilities extends Enum
{
    const fullAccess = 'full-access';
    const limitedAccess = 'limited-access';
    
    public static function getDescription($value): string
    {
        switch ($value) {
            case self::fullAccess:
                return 'Full access with all permissions.';
            case self::limitedAccess:
                return 'Limited access with restricted permissions.';
            default:
                return parent::getDescription($value);
        }
    }
}
