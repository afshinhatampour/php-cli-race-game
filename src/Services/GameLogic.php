<?php

namespace Afshin\Racecli\Services;

use Afshin\Racecli\Entities\Player;
use Afshin\Racecli\Entities\Vehicle;

class GameLogic
{
    /**
     * @var Vehicle
     */
    private Vehicle $playerOneVehicle;

    /**
     * @var Vehicle
     */
    private Vehicle $playerTwoVehicle;

    /**
     * @var float
     */
    private float $playerOneDuration;

    /**
     * @var float
     */
    private float $playerTwoDuration;

    /**
     * @var Player|null
     */
    private ?Player $winner = null;

    /**
     * @param Player $playerOne
     * @param Player $playerTwo
     * @param int $distance
     */
    public function __construct(
        private readonly Player $playerOne,
        private readonly Player $playerTwo,
        private readonly int    $distance)
    {
        $this->playerOneVehicle = $this->playerOne->getVehicle();
        $this->playerTwoVehicle = $this->playerTwo->getVehicle();
    }

    /**
     * @return GameLogic
     */
    public function findWinner(): GameLogic
    {
        if ($this->playerOneVehicle->getMaxSpeed() > $this->playerTwoVehicle->getMaxSpeed()) {
            $this->winner = $this->playerOne;
            return $this;
        }
        if ($this->playerOneVehicle->getMaxSpeed() < $this->playerTwoVehicle->getMaxSpeed()) {
            $this->winner = $this->playerTwo;
            return $this;
        }
        return $this;
    }

    /**
     * @return GameLogic
     */
    public function calcDistanceDurationForEachPlayerVehicle(): GameLogic
    {
        $this->playerOneDuration = $this->distance / $this->playerOne->getVehicle()->getMaxSpeed();
        $this->playerTwoDuration = $this->distance / $this->playerTwo->getVehicle()->getMaxSpeed();
        return $this;
    }

    /**
     * @return array
     */
    public function result(): array
    {
        return [
            'winner'                 => $this->winner,
            'first_player_duration'  => $this->playerOneDuration,
            'second_player_duration' => $this->playerTwoDuration
        ];
    }
}