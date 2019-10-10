<?php

namespace App\Services;

use App\Prize;
use App\WinningNumber;
use App\Result;
use App\User;

class LuckyDrawService
{
    public static function draw($prizeType, $generateRandomly = true, $adminSetWinningNumber = null)
    {
        if (Result::where('prize_type', $prizeType)->exists()) {
            throw new \Exception("One prize can only have one winner");
        }
        $winner_number = null;
        if ($generateRandomly) {
            $winning_numbers = [];
            switch ($prizeType) {
                case Prize::PRIZE_TYPE_GRAND:
                    $winning_numbers = WinningNumber::whereIn('user_id', self::getAvailableGrandPrizeUserIds())->pluck('number')->toArray();
                    break;
                case Prize::PRIZE_TYPE_SECOND_1:
                case Prize::PRIZE_TYPE_SECOND_2:
                case Prize::PRIZE_TYPE_THIRD_1:
                case Prize::PRIZE_TYPE_THIRD_2:
                case Prize::PRIZE_TYPE_THIRD_3:
                    $winning_numbers = WinningNumber::whereIn('user_id', self::getAvailableUserIds())->pluck('number')->toArray();
                    break;
            }

            $winner_number = self::pickANumber($winning_numbers);
        } else {
            $winner_number = $adminSetWinningNumber;
        }
        $result = null;
        // get the winner
        $winner = optional(WinningNumber::with('user', 'user.result')->where('number', $winner_number)->first())->user;
        if ($winner) {
            if (!$winner->result) {
                // record the result
                $result = $winner->result()->firstOrCreate(['prize_type' => $prizeType], [
                    'number' => $winner_number
                ]);
            } else {
                throw new \Exception("$winner->name won one prize previously");
            }
        } else {
            throw new \Exception("No user owns the chosen number: $winner_number");
        }

        return $result;
    }

    public static function getAvailableGrandPrizeUserIds()
    {
        $highest_winning_numbers_user = User::whereDoesntHave('result')
                ->withCount('winningNumbers')
                ->orderBy('winning_numbers_count', 'DESC')
                ->first();
        return User::whereDoesntHave('result')
                ->withCount('winningNumbers')
                ->having('winning_numbers_count', $highest_winning_numbers_user->winning_numbers_count)
                ->pluck('id');
    }

    public static function getAvailableUserIds()
    {
        return User::whereDoesntHave('result')->pluck('id');
    }

    public static function pickANumber(array $numbers)
    {
        $random_index = array_rand($numbers);
        return $numbers[$random_index];
    }
}
