<?php

namespace BayesBall\Enums;

use BenSampo\Enum\Enum;

final class BattingPos extends Enum
{
    const Pitcher = 1;
    const Catcher = 2;
    const FirstBaseman = 3;
    const SecondBaseman = 4;
    const ThirdBaseman = 5;
    const Shortstop = 6;
    const LeftFielder = 7;
    const CenterFielder = 8;
    const RightFielder = 9;

    public static function getDescription( $value): string{
        switch ($value) {
            case self::Pitcher:
                return 'Pitcher';
                break;
            case self::Catcher:
                return 'Catcher';
                break;
            case self::FirstBaseman:
                return 'First Baseman';
                break;
            case self::SecondBaseman:
                return 'Second Baseman';
                break;
            case self::ThirdBaseman:
                return 'Third Baseman';
                break;
            case self::Shortstop:
                return 'Short Stop';
                break;
            case self::LeftFielder:
                return 'Left Fielder';
                break;
            case self::CenterFielder:
                return 'Center Fielder';
                break;
            case self::RightFielder:
                return 'Right Fielder';
                break;
            default:
                return self::getKey($value);
        }
    }

}
