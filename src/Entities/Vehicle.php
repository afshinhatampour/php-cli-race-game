<?php

namespace Afshin\Racecli\Entities;

class Vehicle
{
    /**
     * @var string
     */
    private string $name = '';

    /**
     * @var int
     */
    private int $maxSpeed = 0;

    /**
     * @var string
     */
    private string $unit = '';

    public function __construct(object $params)
    {
        $this->setUnit($params->unit);
        $this->setName($params->name);
        $this->setMaxSpeed($params->maxSpeed);
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $maxSpeed
     * @return void
     */
    public function setMaxSpeed(int $maxSpeed): void
    {
        $this->maxSpeed = $maxSpeed;
    }

    /**
     * @return int
     */
    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    /**
     * @param string $unit
     * @return void
     */
    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
}