<?php

namespace Pokemon\Interfaces;

/**
 * Interface Battlable
 *
 * Defines the contract for any Pokémon that can participate in battles.
 * All Pokémon that implement this interface must provide battle-ready behaviour.
 *
 * @package Pokemon\Interfaces
 */
interface Battlable
{
    /**
     * Executes the Pokémon's signature move during battle.
     *
     * @return string Description of the move being used.
     */
    public function useSignatureMove(): string;

    /**
     * Returns the Pokémon's battle cry / roar.
     *
     * @return string The Pokémon's battle cry.
     */
    public function battleCry(): string;
}
