<?php

namespace Pokemon\Pokemon\Fire;

use Pokemon\Pokemon\Pokemon;

/**
 * Class FirePokemon
 *
 * Represents the Fire elemental type.
 * Extends the base Pokémon class with fire-specific properties and behaviours.
 * All fire-type Pokémon should extend this class.
 *
 * @package Pokemon\Pokemon
 */
abstract class FirePokemon extends Pokemon
{
    /**
     * @var int The intensity of the Pokémon's flame (1–10).
     */
    protected int $flamePower;

    /**
     * FirePokemon constructor.
     *
     * @param string $name        The Pokémon's name.
     * @param int    $level       The Pokémon's current level.
     * @param int    $hp          The Pokémon's hit points.
     * @param int    $flamePower  The intensity of the Pokémon's flame (1–10).
     */
    public function __construct(
        string $name,
        int    $level,
        int    $hp,
        int    $flamePower
    ) {
        parent::__construct($name, $level, $hp, 'Fire');
        $this->flamePower = $flamePower;
    }

    /**
     * Returns the Pokémon's flame power rating.
     *
     * @return int
     */
    public function getFlamePower(): int
    {
        return $this->flamePower;
    }

    /**
     * {@inheritdoc}
     * Fire Pokémon attack with an ember by default.
     */
    public function attack(string $target): string
    {
        return "{$this->name} hurls a scorching ember at {$target}! 🔥 (Flame Power: {$this->flamePower})";
    }

    /**
     * Describes the Pokémon absorbing heat to boost flame power.
     *
     * @return string A message describing the heat absorption.
     */
    public function absorbHeat(): string
    {
        $this->flamePower = min(10, $this->flamePower + 1);

        return "{$this->name} absorbs ambient heat. Flame Power is now {$this->flamePower}!";
    }
}
