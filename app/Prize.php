<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    const PRIZE_TYPE_GRAND = 1;
    const PRIZE_TYPE_SECOND_1 = 2;
    const PRIZE_TYPE_SECOND_2 = 3;
    const PRIZE_TYPE_THIRD_1 = 4;
    const PRIZE_TYPE_THIRD_2 = 5;
    const PRIZE_TYPE_THIRD_3 = 6;

    const PRIZE_TYPES_ARRAY = [
        self::PRIZE_TYPE_GRAND => 'first prize',
        self::PRIZE_TYPE_SECOND_1 => 'second prize 1st winner',
        self::PRIZE_TYPE_SECOND_2 => 'second prize 2nd winner',
        self::PRIZE_TYPE_THIRD_1 => 'third prize 1st winner',
        self::PRIZE_TYPE_THIRD_2 => 'third prize 2nd winner',
        self::PRIZE_TYPE_THIRD_3 => 'third prize 3rd winner'
    ];
}
