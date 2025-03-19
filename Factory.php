<?php
// Ejercicio1/CharacterFactory.php
interface Character {
    public function attack();
    public function speed();
}

class Esqueleto implements Character {
    public function attack() { return "Lanza huesos"; }
    public function speed() { return "Velocidad alta"; }
}

class Zombi implements Character {
    public function attack() { return "Mordisco infectado"; }
    public function speed() { return "Velocidad lenta"; }
}

class CharacterFactory {
    public static function create($nivel) {
        return match(strtolower($nivel)) {
            'facil' => new Esqueleto(),
            'dificil' => new Zombi(),
            default => throw new Exception("Nivel inválido")
        };
    }
}

// Ejercicio1/ejercicio1.php
function executeExercise1() {
    require_once 'CharacterFactory.php';
    
    $nivel = readline("Ingrese nivel (facil/dificil): ");
    $personaje = CharacterFactory::create($nivel);
    
    echo "\n=== PERSONAJE CREADO ===";
    echo "\nAtaque: ".$personaje->attack();
    echo "\nVelocidad: ".$personaje->speed()."\n\n";
}
