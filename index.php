<?php

declare(strict_types=1);

/**
 * index.php
 *
 * Entry point for the Pokémon class hierarchy demonstration.
 * Uses spl_autoload_register to automatically load classes from the src/ directory.
 *
 * Hierarchy overview:
 *   Pokemon (abstract, root)
 *   ├── FirePokemon  (abstract) ── Charizard, Magmar
 *   ├── WaterPokemon (abstract) ── Blastoise
 *   └── GrassPokemon (abstract) ── Venusaur
 *
 * Trait:     Evolvable  (used by Charizard, Magmar, Blastoise, Venusaur)
 * Interface: Battlable  (implemented by Pokemon root and all descendants)
 */

// ─────────────────────────────────────────────────────────────────────────────
// Autoloader
// ─────────────────────────────────────────────────────────────────────────────

spl_autoload_register(function (string $class): void {
    /*
     * Map the root namespace "Pokemon" to the src/ directory.
     * e.g.  Pokemon\Pokemon\Charizard  →  src/Pokemon/Charizard.php
     *       Pokemon\Traits\Evolvable   →  src/Traits/Evolvable.php
     */
    $prefix   = 'Pokemon\\';
    $baseDir  = __DIR__ . '/src/';

    // Check whether the class uses our namespace prefix.
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return; // Not our namespace – let another autoloader handle it.
    }

    $relativeClass = substr($class, strlen($prefix));
    $file          = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// ─────────────────────────────────────────────────────────────────────────────
// Bring class names into scope
// ─────────────────────────────────────────────────────────────────────────────

use Pokemon\Pokemon\Fire\Charizard;
use Pokemon\Pokemon\Fire\Magmar;
use Pokemon\Pokemon\Water\Blastoise;
use Pokemon\Pokemon\Grass\Venusaur;

// ─────────────────────────────────────────────────────────────────────────────
// Helper – pretty section header
// ─────────────────────────────────────────────────────────────────────────────

/**
 * Prints a formatted section divider with a title.
 *
 * @param string $title The section heading text.
 * @return void
 */
function section(string $title): void
{
    echo PHP_EOL . str_repeat('=', 60) . PHP_EOL;
    echo "  {$title}" . PHP_EOL;
    echo str_repeat('=', 60) . PHP_EOL;
}

// ─────────────────────────────────────────────────────────────────────────────
// Instantiate Pokémon
// ─────────────────────────────────────────────────────────────────────────────

//                        level  hp   flamePower  wingspan
$charizard = new Charizard(36,   250, 9,          1);

//                       level  hp   flamePower  isOverheated
$magmar    = new Magmar(  28,   170, 7,          false);

//                         level  hp   waterPressure  cannonCount
$blastoise = new Blastoise(36,   260, 8,             2);

//                         level  hp   leafSharpness  flowerBloomed
$venusaur  = new Venusaur( 36,   240, 7,             true);

// ─────────────────────────────────────────────────────────────────────────────
// Demo – Charizard
// ─────────────────────────────────────────────────────────────────────────────

section('🔥 CHARIZARD (FirePokemon → Pokemon)');

echo $charizard->stats()                    . PHP_EOL;
echo $charizard->battleCry()                . PHP_EOL;
echo $charizard->attack('Blastoise')        . PHP_EOL;
echo $charizard->useSignatureMove()         . PHP_EOL;
echo $charizard->absorbHeat()               . PHP_EOL;
echo $charizard->rest()                     . PHP_EOL;

// Evolution via Evolvable trait
echo $charizard->evolve('Charmeleon')       . PHP_EOL;
echo $charizard->evolutionStatus()          . PHP_EOL;

// ─────────────────────────────────────────────────────────────────────────────
// Demo – Magmar
// ─────────────────────────────────────────────────────────────────────────────

section('🌋 MAGMAR (FirePokemon → Pokemon)');

echo $magmar->stats()                       . PHP_EOL;
echo $magmar->battleCry()                   . PHP_EOL;
echo $magmar->attack('Venusaur')            . PHP_EOL;
echo $magmar->useSignatureMove()            . PHP_EOL;
echo $magmar->overheat()                    . PHP_EOL;
echo "Overheated? " . ($magmar->isOverheated() ? 'Yes' : 'No') . PHP_EOL;

echo $magmar->evolve('Magby')               . PHP_EOL;
echo $magmar->evolutionStatus()             . PHP_EOL;

// ─────────────────────────────────────────────────────────────────────────────
// Demo – Blastoise
// ─────────────────────────────────────────────────────────────────────────────

section('💧 BLASTOISE (WaterPokemon → Pokemon)');

echo $blastoise->stats()                    . PHP_EOL;
echo $blastoise->battleCry()               . PHP_EOL;
echo $blastoise->attack('Charizard')        . PHP_EOL;
echo $blastoise->useSignatureMove()         . PHP_EOL;
echo $blastoise->dive()                     . PHP_EOL;
echo $blastoise->rest()                     . PHP_EOL;

echo $blastoise->evolve('Wartortle')        . PHP_EOL;
echo $blastoise->evolutionStatus()          . PHP_EOL;
echo "Cannons: " . $blastoise->getCannonCount() . PHP_EOL;

// ─────────────────────────────────────────────────────────────────────────────
// Demo – Venusaur
// ─────────────────────────────────────────────────────────────────────────────

section('🌿 VENUSAUR (GrassPokemon → Pokemon)');

echo $venusaur->stats()                       . PHP_EOL;
echo $venusaur->battleCry()                  . PHP_EOL;
echo $venusaur->attack('Magmar')              . PHP_EOL;
echo $venusaur->useSignatureMove()            . PHP_EOL;
echo $venusaur->synthesis()                   . PHP_EOL;
echo $venusaur->releaseToxicSpores('Magmar')  . PHP_EOL;

echo $venusaur->evolve('Ivysaur')             . PHP_EOL;
echo $venusaur->evolutionStatus()             . PHP_EOL;
echo "Flower bloomed? " . ($venusaur->isFlowerBloomed() ? 'Yes' : 'No') . PHP_EOL;

// ─────────────────────────────────────────────────────────────────────────────
// Demo – Polymorphism: treat all as Pokemon (via Battlable interface)
// ─────────────────────────────────────────────────────────────────────────────

section('⚔️  BATTLE ROUND – Polymorphic Battlable Demo');

/** @var \Pokemon\Interfaces\Battlable[] $roster */
$roster = [$charizard, $magmar, $blastoise, $venusaur];

foreach ($roster as $pokemon) {
    echo $pokemon->battleCry() . PHP_EOL;
    echo $pokemon->useSignatureMove() . PHP_EOL;
    echo str_repeat('-', 40) . PHP_EOL;
}

echo PHP_EOL . "🏆  Battle complete!" . PHP_EOL . PHP_EOL;
