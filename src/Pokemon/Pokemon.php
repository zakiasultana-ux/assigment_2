<?php

namespace Pokemon\Pokemon;

use Pokemon\Interfaces\Battlable;

/**
 * Class Pokemon
 *
 * The root of the Pokémon class hierarchy.
 * Defines core properties and behaviours shared by all Pokémon.
 * All specific Pokémon types extend this class.
 *
 * @package Pokemon
 */
abstract class Pokemon implements Battlable
{
    /**
     * Pokemon constructor.
     *
     * @param string $name      The Pokémon's name.
     * @param int    $level     The Pokémon's current level (1–100).
     * @param int    $hp        The Pokémon's hit points.
     * @param string $type      The elemental type (e.g. Fire, Water, Grass).
     */
    public function __construct(
        protected string $name,
        protected int    $level,
        protected int    $hp,
        protected string $type
    ) {}

    // -------------------------------------------------------------------------
    // Getters
    // -------------------------------------------------------------------------

    /**
     * Returns the Pokémon's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns the Pokémon's current level.
     *
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Returns the Pokémon's current HP.
     *
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * Returns the Pokémon's elemental type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    // -------------------------------------------------------------------------
    // Shared behaviours (can be overridden by subclasses)
    // -------------------------------------------------------------------------

    /**
     * Describes how the Pokémon attacks a target.
     *
     * @param string $target Name of the target Pokémon.
     * @return string A description of the attack.
     */
    public function attack(string $target): string
    {
        return "{$this->name} attacks {$target} with a basic strike!";
    }

    /**
     * Describes the Pokémon resting and recovering HP.
     *
     * @return string A message describing the rest action.
     */
    public function rest(): string
    {
        $recovered    = (int) round($this->hp * 0.1);
        $this->hp    += $recovered;

        return "{$this->name} rests and recovers {$recovered} HP. Current HP: {$this->hp}.";
    }

    /**
     * Returns a summary of the Pokémon's current stats.
     *
     * @return string A formatted stats string.
     */
    public function stats(): string
    {
        return "[{$this->name}] Type: {$this->type} | Level: {$this->level} | HP: {$this->hp}";
    }

    // -------------------------------------------------------------------------
    // Battlable interface – concrete default implementations
    // -------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function battleCry(): string
    {
        return "{$this->name}!!";
    }
}
