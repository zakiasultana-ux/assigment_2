<?php

namespace Pokemon\Pokemon\Grass;

use Pokemon\Pokemon\Pokemon;

/**
 * Class GrassPokemon
 *
 * Represents the Grass elemental type.
 * Extends the base Pokémon class with grass-specific properties and behaviours.
 * All grass-type Pokémon should extend this class.
 *
 * @package Pokemon\Pokemon
 */
abstract class GrassPokemon extends Pokemon
{
    /**
     * @var int The sharpness of the Pokémon's leaves (1–10).
     */
    protected int $leafSharpness;

    /**
     * GrassPokemon constructor.
     *
     * @param string $name         The Pokémon's name.
     * @param int    $level        The Pokémon's current level.
     * @param int    $hp           The Pokémon's hit points.
     * @param int    $leafSharpness The sharpness of the Pokémon's leaves (1–10).
     */
    public function __construct(
        string $name,
        int    $level,
        int    $hp,
        int    $leafSharpness
    ) {
        parent::__construct($name, $level, $hp, 'Grass');
        $this->leafSharpness = $leafSharpness;
    }

    /**
     * Returns the sharpness rating of the Pokémon's leaves.
     *
     * @return int
     */
    public function getLeafSharpness(): int
    {
        return $this->leafSharpness;
    }

    /**
     * {@inheritdoc}
     * Grass Pokémon attack with razor leaves by default.
     */
    public function attack(string $target): string
    {
        return "{$this->name} slices {$target} with razor-sharp leaves! 🍃 (Sharpness: {$this->leafSharpness})";
    }

    /**
     * Describes the Pokémon photosynthesising to recover HP.
     *
     * @return string A message describing the synthesis action.
     */
    public function synthesis(): string
    {
        $recovered    = (int) round($this->hp * 0.25);
        $this->hp    += $recovered;

        return "{$this->name} uses Synthesis and restores {$recovered} HP! 🌿 Current HP: {$this->hp}";
    }
}
