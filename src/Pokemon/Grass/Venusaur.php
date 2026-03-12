<?php

namespace Pokemon\Pokemon\Grass;

use Pokemon\Traits\Evolvable;

/**
 * Class Venusaur
 *
 * A grass and poison-type Pokémon with a large flower on its back.
 * Extends GrassPokemon and uses the Evolvable trait.
 *
 * Pokédex: The flower on Venusaur's back has bloomed to absorb sunlight.
 *
 * @package Pokemon\Pokemon
 */
class Venusaur extends GrassPokemon
{
    use Evolvable;

    /**
     * @var bool Whether Venusaur's back flower is in bloom.
     */
    private bool $flowerBloomed = true;

    /**
     * Venusaur constructor.
     *
     * @param int  $level          The Pokémon's current level.
     * @param int  $hp             The Pokémon's hit points.
     * @param int  $leafSharpness  The sharpness of Venusaur's leaves (1–10).
     * @param bool $flowerBloomed  Whether Venusaur's back flower is in bloom.
     */
    public function __construct(
        int  $level,
        int  $hp,
        int  $leafSharpness,
        bool $flowerBloomed = true
    ) {
        parent::__construct('Venusaur', $level, $hp, $leafSharpness);
        $this->flowerBloomed = $flowerBloomed;
    }

    /**
     * Returns whether Venusaur's back flower is currently bloomed.
     *
     * @return bool
     */
    public function isFlowerBloomed(): bool
    {
        return $this->flowerBloomed;
    }

    /**
     * Describes Venusaur releasing toxic spores from its flower.
     *
     * @param string $target Name of the Pokémon to poison.
     * @return string A message describing the poisoning.
     */
    public function releaseToxicSpores(string $target): string
    {
        if (!$this->flowerBloomed) {
            return "{$this->name}'s flower has not bloomed — spores cannot be released!";
        }

        return "{$this->name} releases a cloud of toxic spores at {$target}! ☠️🌸";
    }

    /**
     * {@inheritdoc}
     * Venusaur's signature move is Solar Beam.
     */
    public function useSignatureMove(): string
    {
        return "{$this->name} charges and fires a powerful Solar Beam! ☀️🌿";
    }

    /**
     * {@inheritdoc}
     */
    public function battleCry(): string
    {
        return "Venusaur! Saur-SAUR!";
    }

    /**
     * {@inheritdoc}
     * Overrides GrassPokemon::attack() to use vine whip instead.
     */
    public function attack(string $target): string
    {
        return "{$this->name} lashes {$target} with powerful Vine Whips! 🌿 (Leaf Sharpness: {$this->leafSharpness})";
    }
}
