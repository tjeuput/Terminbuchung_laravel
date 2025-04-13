<?php

namespace App\Services;

class TerminSessionManager
{
    const BASE_KEY = 'terminbuchung';

    public function updateStep(int $step, array $data): void
    {
        session([
            self::BASE_KEY.".schritt{$step}" => $data,
            self::BASE_KEY.".termininformation" => array_merge(
                session(self::BASE_KEY.".termininformation", []),
                $data
            ),
            self::BASE_KEY.".current_step" => $step
        ]);
    }

    public function getTerminSession(): array
    {
        return session(self::BASE_KEY.".termininformation", []);
    }
}
