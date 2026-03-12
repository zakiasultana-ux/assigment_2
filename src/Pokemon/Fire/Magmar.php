<?php

namespace Pokemon\Pokemon\Fire;

use Pokemon\Traits\Evolvable;

/**
 * Class Magmar
 *
 * A fire-type Pokémon that resembles a flame-covered duck.
 * Extends FirePokemon and uses the Evolvable trait.
 *
 * Pokédex: Magmar dispatches its prey with a fire that burns intensely.
 *
 * @package Pokemon\Pokemon
 */
class Magmar extends FirePokemon
{
    use Evolvable;

    /**
     * Magmar constructor.
     *
     * @param int  $level        The Pokémon's current level.
     * @param int  $hp           The Pokémon's hit points.
     * @param int  $flamePower   The intensity of Magmar's flame (1–10).
     * @param bool $isOverheated Whether Magmar is currently overheated.
     */
    public function __construct(
        int             $level,
        int             $hp,
        int             $flamePower,
        private bool    $isOverheated = false
    ) {
        parent::__construct('Magmar', $level, $hp, $flamePower);
    }

    /**
     * Returns whether Magmar is currently in an overheated state.
     *
     * @return bool
     */
    public function isOverheated(): bool
    {
        return $this->isOverheated;
    }

    /**
     * Triggers Magmar's overheated state, temporarily boosting flame power.
     *
     * @return string A message describing the overheat.
     */
    public function overheat(): string
    {
        $this->isOverheated = true;
        $this->flamePower   = min(10, $this->flamePower + 3);

        return "{$this->name} overheats! Flame Power surges to {$this->flamePower}! 🌋 (Overheated!)";
    }

    /**
     * {@inheritdoc}
     * Magmar's signature move is Fire Punch.
     */
    public function useSignatureMove(): string
    {
        return "{$this->name} connects with a blazing Fire Punch! 👊🔥";
    }

    /**
     * {@inheritdoc}
     */
    public function battleCry(): string
    {
        return "Magmar! Mag-MAG!";
    }
}
