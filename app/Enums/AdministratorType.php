<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AdministratorType extends Enum
{
    const Provost = 'provost';
    const AssistantProvost = 'assistant-provost';
    const Staff = 'staff';
}