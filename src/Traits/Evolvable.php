<?php

namespace Pokemon\Traits;

/**
 * Trait Evolvable
 *
 * Provides shared evolution functionality to Pokémon classes
 * without affecting their inheritance chain.
 * Can be used by any Pokémon regardless of type.
 *
 * @package Pokemon\Traits
 */
trait Evolvable
{
    /** @var bool Whether this Pokémon has already evolved. */
    private bool $hasEvolved = false;

    /** @var string|null The name of the Pokémon this one evolved from. */
    private ?string $evolvedFrom = null;

    /**
     * Triggers the evolution of the Pokémon.
     *
     * @param string $previousForm The name of the pre-evolution form.
     * @return string A message describing the evolution event.
     */
    public function evolve(string $previousForm): string
    {
        $this->hasEvolved    = true;
        $this->evolvedFrom   = $previousForm;

        return "{$this->getName()} evolved from {$previousForm}! ✨";
    }

    /**
     * Returns whether this Pokémon has undergone evolution.
     *
     * @return bool True if the Pokémon has evolved, false otherwise.
     */
    public function hasEvolved(): bool
    {
        return $this->hasEvolved;
    }

    /**
     * Returns the name of the pre-evolution form, if any.
     *
     * @return string|null The previous form's name, or null if not evolved.
     */
    public function getEvolvedFrom(): ?string
    {
        return $this->evolvedFrom;
    }

    /**
     * Returns a formatted evolution status string.
     *
     * @return string A sentence describing the evolution status.
     */
    public function evolutionStatus(): string
    {
        if ($this->hasEvolved && $this->evolvedFrom !== null) {
            return "{$this->getName()} is an evolved form of {$this->evolvedFrom}.";
        }

        return "{$this->getName()} has not yet evolved.";
    }
}
