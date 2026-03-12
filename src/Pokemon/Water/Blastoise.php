<?php

namespace Pokemon\Pokemon\Water;

use Pokemon\Traits\Evolvable;

/**
 * Class Blastoise
 *
 * A powerful water-type Pokémon with twin cannons on its shell.
 * Extends WaterPokemon and uses the Evolvable trait.
 *
 * Pokédex: Blastoise has water spouts that protrude from its shell.
 *
 * @package Pokemon\Pokemon
 */
class Blastoise extends WaterPokemon
{
    use Evolvable;

    /**
     * Blastoise constructor.
     *
     * @param int $level         The Pokémon's current level.
     * @param int $hp            The Pokémon's hit points.
     * @param int $waterPressure The pressure of Blastoise's water cannons (1–10).
     * @param int $cannonCount   The number of water cannons (usually 2).
     */
    public function __construct(
        int             $level,
        int             $hp,
        int             $waterPressure,
        private int     $cannonCount = 2
    ) {
        parent::__construct('Blastoise', $level, $hp, $waterPressure);
    }

    /**
     * Returns the number of water cannons on Blastoise's shell.
     *
     * @return int
     */
    public function getCannonCount(): int
    {
        return $this->cannonCount;
    }

    /**
     * {@inheritdoc}
     * Blastoise attacks by firing all cannons simultaneously.
     */
    public function attack(string $target): string
    {
        return "{$this->name} blasts {$target} with {$this->cannonCount} simultaneous Hydro Cannons! 💦 (Pressure: {$this->waterPressure})";
    }

    /**
     * {@inheritdoc}
     * Blastoise's signature move is Hydro Pump.
     */
    public function useSignatureMove(): string
    {
        return "{$this->name} fires a devastating Hydro Pump from all {$this->cannonCount} cannons! 💧💧";
    }

    /**
     * {@inheritdoc}
     */
    public function battleCry(): string
    {
        return "BLASTOISE!!";
    }
}
