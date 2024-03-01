<?php

namespace Afshin\Racecli\Entities;

class Player
{
    private Vehicle $vehicle;

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @param Vehicle $vehicle
     * @return void
     */
    public function setVehicle(Vehicle $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return Vehicle
     */
    public function getVehicle(): Vehicle
    {
        return $this->vehicle;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}