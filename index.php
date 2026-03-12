<?php

declare(strict_types=1);

/**
 * index.php
 *
 * Entry point for the Pokémon class hierarchy demonstration.
 * Uses spl_autoload_register to automatically load classes from the src/ directory.
 * Outputs a styled HTML page for clean browser display.
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
// Autoloader  (PSR-4, works on Windows and Unix)
// ─────────────────────────────────────────────────────────────────────────────

spl_autoload_register(function (string $class): void {
    $prefix  = 'Pokemon\\';
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file          = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

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
// HTML helper functions
// ─────────────────────────────────────────────────────────────────────────────

/**
 * Renders an opening Pokemon card with a coloured header.
 *
 * @param string $title     The card heading (Pokemon name + type chain).
 * @param string $colorClass CSS class controlling the header colour.
 * @return void
 */
function cardOpen(string $title, string $colorClass): void
{
    echo "<div class=\"card\">";
    echo "<div class=\"card-header {$colorClass}\">{$title}</div>";
    echo "<ul class=\"card-body\">";
}

/**
 * Renders a single list item inside a card.
 *
 * @param string $text     The line of output to display.
 * @param string $cssClass Optional extra CSS class for the li element.
 * @return void
 */
function cardLine(string $text, string $cssClass = ''): void
{
    $cls = $cssClass ? " class=\"{$cssClass}\"" : '';
    echo "<li{$cls}>" . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . "</li>";
}

/**
 * Closes an open Pokemon card.
 *
 * @return void
 */
function cardClose(): void
{
    echo "</ul></div>";
}

// ─────────────────────────────────────────────────────────────────────────────
// Instantiate Pokemon
// ─────────────────────────────────────────────────────────────────────────────

//                        level  hp   flamePower  wingspan
$charizard = new Charizard(36,   250, 9,          1);

//                       level  hp   flamePower  isOverheated
$magmar    = new Magmar(  28,   170, 7,          false);

//                         level  hp   waterPressure  cannonCount
$blastoise = new Blastoise(36,   260, 8,             2);

//                         level  hp   leafSharpness  flowerBloomed
$venusaur  = new Venusaur( 36,   240, 7,             true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon Class Hierarchy Demo</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>
<body>

<h1>Pokemon Class Hierarchy Demo</h1>
<p class="subtitle">PHP OOP &nbsp;&middot;&nbsp; Abstract Classes &nbsp;&middot;&nbsp; Interface &nbsp;&middot;&nbsp; Trait &nbsp;&middot;&nbsp; spl_autoload_register</p>

<div class="section-label">Pokemon Showcase</div>
<div class="grid">

<?php
cardOpen('Charizard &nbsp;<small>FirePokemon &rarr; Pokemon</small>', 'fire');
cardLine($charizard->stats(),                'line-stats');
cardLine($charizard->battleCry(),            'line-cry');
cardLine($charizard->attack('Blastoise'),    'line-attack');
cardLine($charizard->useSignatureMove(),     'line-move');
cardLine($charizard->absorbHeat(),           'line-special');
cardLine($charizard->rest(),                 'line-special');
cardLine($charizard->evolve('Charmeleon'),   'line-evolve');
cardLine($charizard->evolutionStatus(),      'line-status');
cardClose();

cardOpen('Magmar &nbsp;<small>FirePokemon &rarr; Pokemon</small>', 'fire');
cardLine($magmar->stats(),                   'line-stats');
cardLine($magmar->battleCry(),               'line-cry');
cardLine($magmar->attack('Venusaur'),        'line-attack');
cardLine($magmar->useSignatureMove(),        'line-move');
cardLine($magmar->overheat(),                'line-special');
cardLine('Overheated? ' . ($magmar->isOverheated() ? 'Yes' : 'No'), 'line-special');
cardLine($magmar->evolve('Magby'),           'line-evolve');
cardLine($magmar->evolutionStatus(),         'line-status');
cardClose();

cardOpen('Blastoise &nbsp;<small>WaterPokemon &rarr; Pokemon</small>', 'water');
cardLine($blastoise->stats(),                'line-stats');
cardLine($blastoise->battleCry(),            'line-cry');
cardLine($blastoise->attack('Charizard'),    'line-attack');
cardLine($blastoise->useSignatureMove(),     'line-move');
cardLine($blastoise->dive(),                 'line-special');
cardLine($blastoise->rest(),                 'line-special');
cardLine($blastoise->evolve('Wartortle'),    'line-evolve');
cardLine($blastoise->evolutionStatus(),      'line-status');
cardLine('Cannons: ' . $blastoise->getCannonCount(), 'line-status');
cardClose();

cardOpen('Venusaur &nbsp;<small>GrassPokemon &rarr; Pokemon</small>', 'grass');
cardLine($venusaur->stats(),                      'line-stats');
cardLine($venusaur->battleCry(),                  'line-cry');
cardLine($venusaur->attack('Magmar'),             'line-attack');
cardLine($venusaur->useSignatureMove(),           'line-move');
cardLine($venusaur->synthesis(),                  'line-special');
cardLine($venusaur->releaseToxicSpores('Magmar'), 'line-special');
cardLine($venusaur->evolve('Ivysaur'),            'line-evolve');
cardLine($venusaur->evolutionStatus(),            'line-status');
cardLine('Flower bloomed? ' . ($venusaur->isFlowerBloomed() ? 'Yes' : 'No'), 'line-status');
cardClose();
?>

</div>

<div class="section-label">Battle Round &mdash; Polymorphic Battlable Demo</div>
<div class="battle-grid">
<?php
/** @var \Pokemon\Interfaces\Battlable[] $roster */
$roster = [$charizard, $magmar, $blastoise, $venusaur];
foreach ($roster as $pokemon): ?>
    <div class="battle-card">
        <div class="cry"><?= htmlspecialchars($pokemon->battleCry(), ENT_QUOTES, 'UTF-8') ?></div>
        <div class="move"><?= htmlspecialchars($pokemon->useSignatureMove(), ENT_QUOTES, 'UTF-8') ?></div>
    </div>
<?php endforeach; ?>
</div>

<div class="footer">Battle complete!</div>

</body>
</html>