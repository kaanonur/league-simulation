<?php

namespace App\Services\Simulator;

use App\Repositories\MatchRepository;
use App\Repositories\StandingRepository;

class MatchSimulator implements ResultSimulatorInterface
{

    protected $standingRepository;
    protected $matchRepository;

    public function __construct(StandingRepository $standingRepository, MatchRepository $matchRepository)
    {
        $this->standingRepository = $standingRepository;
        $this->matchRepository = $matchRepository;
    }

    public function simulate($match)
    {
        $home = $this->standingRepository->getStandingByTeamId($match->home_team);
        $away = $this->standingRepository->getStandingByTeamId($match->away_team);
        $homeTeamPower = $this->matchRepository->getTeamPowerByTeamId($home->team_id);
        $awayTeamPower = $this->matchRepository->getTeamPowerByTeamId($away->team_id);

        $winningChance = $homeTeamPower / ($homeTeamPower + $awayTeamPower);
        $winner = (rand(0, 1) < $winningChance) ? $home->id : $away->id;

        $homeScore = ($winner === $home->id) ? rand(1, 5) : rand(0, 4);
        $awayScore = ($winner === $away->id) ? rand(1, 5) : rand(0, 4);

        $this->updateMatchScore($homeScore, $awayScore, $home, $away);
        return $this->matchRepository->resultSaver($match, $homeScore, $awayScore);

    }

    public function bulkSimulate($matches)
    {
        foreach ($matches as $match) {
            $this->simulate($match);
        }
    }

    public function updateMatchScore($homeScore, $awayScore, $home, $away)
    {
        $this->matchRepository->updateMatchScore($homeScore, $awayScore, $home, $away);
    }

}
