<?php

namespace BayesBall\Enums;

use BenSampo\Enum\Enum;

final class TeamName extends Enum
{
    const ANA = "ANA";
    const ARI = "ARI";
    const ATL = "ATL";
    const BAL = "BAL";
    const BOS = "BOS";
    const CHA = "CHA";
    const CHN = "CHN";
    const CIN = "CIN";
    const CLE = "CLE";
    const COL = "COL";
    const DET = "DET";
    const HOU = "HOU";
    const KCA = "KCA";
    const LAN = "LAN";
    const MIA = "MIA";
    const MIL = "MIL";
    const MIN = "MIN";
    const NYA = "NYA";
    const NYN = "NYN";
    const OAK = "OAK";
    const PHI = "PHI";
    const PIT = "PIT";
    const SDN = "SDN";
    const SEA = "SEA";
    const SFN = "SFN";
    const SLN = "SLN";
    const TBA = "TBA";
    const TEX = "TEX";
    const TOR = "TOR";
    const WAS = "WAS";

    public static function getDescription( $value): string{
        switch ($value) {
            case self::ANA:
                return 'Angels';
                break;
            case self::ARI:
                return 'Diamondbacks';
                break;
            case self::ATL:
                return 'Braves';
                break;
            case self::BAL:
                return 'Orioles';
                break;
            case self::BOS:
                return 'Red Sox';
                break;
            case self::CHA:
                return 'White Sox';
                break;
            case self::CHN:
                return 'Cubs';
                break;
            case self::CIN:
                return 'Reds';
                break;
            case self::CLE:
                return 'Indians';
                break;
            case self::COL:
                return 'Rockies';
                break;
            case self::DET:
                return 'Tigers';
                break;
            case self::HOU:
                return 'Astros';
                break;
            case self::KCA:
                return 'Royals';
                break;
            case self::LAN:
                return 'Dodgers';
                break;
            case self::MIA:
                return 'Marlins';
                break;
            case self::MIL:
                return 'Brewers';
                break;
            case self::MIN:
                return 'Twins';
                break;
            case self::NYA:
                return 'Yankees';
                break;
            case self::NYN:
                return 'Mets';
                break;
            case self::OAK:
                return 'Athletics';
                break;
            case self::PHI:
                return 'Phillies';
                break;
            case self::PIT:
                return 'Pirates';
                break;
            case self::SDN:
                return 'Padres';
                break;
            case self::SEA:
                return 'Mariners';
                break;
            case self::SFN:
                return 'Giants';
                break;
            case self::SLN:
                return 'Cardinals';
                break;
            case self::TBA:
                return 'Bay Rays';
                break;
            case self::TEX:
                return 'Rangers';
                break;
            case self::TOR:
                return 'Blue Jays';
                break;
            case self::WAS:
                return 'Nationals';
                break;



            default:
                return self::getKey($value);
        }
    }
}
