<?php

namespace Pokemon\Pokemon\Fire;

use Pokemon\Traits\Evolvable;

/**
 * Class Charizard
 *
 * The fully-evolved fire and flying Pokémon.
 * Extends FirePokemon and uses the Evolvable trait to track evolution history.
 *
 * Pokédex: Charizard flies around the sky in search of powerful opponents.
 *
 * @package Pokemon\Pokemon
 */
class Charizard extends FirePokemon
{
    use Evolvable;

    /**
     * @var int Charizard's wingspan in metres.
     */
    private int $wingspan;

    /**
     * Charizard constructor.
     *
     * @param int $level      The Pokémon's current level.
     * @param int $hp         The Pokémon's hit points.
     * @param int $flamePower The intensity of Charizard's flame (1–10).
     * @param int $wingspan   Charizard's wingspan in metres.
     */
    public function __construct(
        int $level,
        int $hp,
        int $flamePower,
        int $wingspan
    ) {
        parent::__construct('Charizard', $level, $hp, $flamePower);
        $this->wingspan = $wingspan;
    }

    /**
     * Returns Charizard's wingspan in metres.
     *
     * @return int
     */
    public function getWingspan(): int
    {
        return $this->wingspan;
    }

    /**
     * {@inheritdoc}
     * Charizard's signature move is Flamethrower.
     */
    public function useSignatureMove(): string
    {
        return "{$this->name} unleashes a devastating Flamethrower! 🔥🔥🔥";
    }

    /**
     * {@inheritdoc}
     * Charizard has a fierce, iconic battle cry.
     */
    public function battleCry(): string
    {
        return "CHARIZAAAARD!!";
    }

    /**
     * {@inheritdoc}
     * Charizard attacks by dive-bombing from the air.
     */
    public function attack(string $target): string
    {
        return "{$this->name} dive-bombs {$target} from the sky with Flamethrower! 🔥 (Flame Power: {$this->flamePower})";
    }
}
