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
    const DesignatedHitter =10;

    public static function getDescription( $value): string{
        switch ($value) {
            case self::Pitcher:
                return 'P';
                break;
            case self::Catcher:
                return 'C';
                break;
            case self::FirstBaseman:
                return '1B';
                break;
            case self::SecondBaseman:
                return '2B';
                break;
            case self::ThirdBaseman:
                return '3B';
                break;
            case self::Shortstop:
                return 'SS';
                break;
            case self::LeftFielder:
                return 'LF';
                break;
            case self::CenterFielder:
                return 'CF';
                break;
            case self::RightFielder:
                return 'RF';
                break;
            case self::DesignatedHitter:
                return 'DH';
                break;
            default:
                return self::getKey($value);
        }
    }

}
