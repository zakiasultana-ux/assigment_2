<?php

namespace Pokemon\Pokemon\Water;

use Pokemon\Pokemon\Pokemon;

/**
 * Class WaterPokemon
 *
 * Represents the Water elemental type.
 * Extends the base Pokémon class with water-specific properties and behaviours.
 * All water-type Pokémon should extend this class.
 *
 * @package Pokemon\Pokemon
 */
abstract class WaterPokemon extends Pokemon
{
    /**
     * @var int The pressure of the Pokémon's water jets (1–10).
     */
    protected int $waterPressure;

    /**
     * WaterPokemon constructor.
     *
     * @param string $name         The Pokémon's name.
     * @param int    $level        The Pokémon's current level.
     * @param int    $hp           The Pokémon's hit points.
     * @param int    $waterPressure The pressure of the Pokémon's water jets (1–10).
     */
    public function __construct(
        string $name,
        int    $level,
        int    $hp,
        int    $waterPressure
    ) {
        parent::__construct($name, $level, $hp, 'Water');
        $this->waterPressure = $waterPressure;
    }

    /**
     * Returns the Pokémon's water pressure rating.
     *
     * @return int
     */
    public function getWaterPressure(): int
    {
        return $this->waterPressure;
    }

    /**
     * {@inheritdoc}
     * Water Pokémon attack with a water gun by default.
     */
    public function attack(string $target): string
    {
        return "{$this->name} fires a high-pressure water jet at {$target}! 💧 (Pressure: {$this->waterPressure})";
    }

    /**
     * Describes the Pokémon diving to evade an incoming attack.
     *
     * @return string A message describing the dive action.
     */
    public function dive(): string
    {
        return "{$this->name} dives underwater to dodge the attack! 🌊";
    }
}
