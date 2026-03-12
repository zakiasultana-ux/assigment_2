# assigment_2 - OOPs
A PHP class hierarchy demonstration using Pokémon as the domain. Built with PSR-4 autoloading, interfaces, and traits.

## Folder Structure

pokemon/
├── index.php
└── src/
    ├── Interfaces/
    │   └── Battlable.php
    ├── Traits/
    │   └── Evolvable.php
    └── Pokemon/
        ├── Pokemon.php
        ├── Fire/
        │   ├── FirePokemon.php
        │   ├── Charizard.php
        │   └── Magmar.php
        ├── Water/
        │   ├── WaterPokemon.php
        │   └── Blastoise.php
        └── Grass/
            ├── GrassPokemon.php
            └── Venusaur.php

## Class Hierarchy

Pokemon  (abstract, root)
├── FirePokemon  (abstract)
│   ├── Charizard
│   └── Magmar
├── WaterPokemon  (abstract)
│   └── Blastoise
└── GrassPokemon  (abstract)
    └── Venusaur

## Running the Demo

php index.php

## Creadit 

- Zakia Sultana