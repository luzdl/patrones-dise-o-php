<?php
// Ejercicio3/CharacterDecorator.php
interface Character {
    public function getDamage();
    public function getDescription();
}

class HarryPotter implements Character {
    public function getDamage() { return 15; }
    public function getDescription() { return "Harry Potter"; }
}

class LukeSkywalker implements Character {
    public function getDamage() { return 20; }
    public function getDescription() { return "Luke Skywalker"; }
}

abstract class WeaponDecorator implements Character {
    protected $character;
    
    public function __construct(Character $character) {
        $this->character = $character;
    }
}

class VaritaMagicaDecorator extends WeaponDecorator {
    public function getDamage() { return $this->character->getDamage() + 25; }
    public function getDescription() { 
        return $this->character->getDescription()." con Varita Mágica (Daño mágico +25)";
    }
}

class LightsaberDecorator extends WeaponDecorator {
    public function getDamage() { return $this->character->getDamage() + 35; }
    public function getDescription() { 
        return $this->character->getDescription()." con Sable de Luz (Daño Jedi +35)";
    }
}

// Ejercicio3/ejercicio3.php
function executeExercise3() {
    require_once 'CharacterDecorator.php';
    
    echo "\n=== COMBINACIONES DE PERSONAJES ===";
    
    // Harry Potter con diferentes armas
    $harry = new HarryPotter();
    $harryVarita = new VaritaMagicaDecorator($harry);
    $harryLightsaber = new LightsaberDecorator($harry);
    
    // Luke Skywalker con diferentes armas
    $luke = new LukeSkywalker();
    $lukeLightsaber = new LightsaberDecorator($luke);
    $lukeVarita = new VaritaMagicaDecorator($luke);
    
    echo "\n\n--- Harry Potter ---";
    echo "\nBase: ".$harry->getDescription()." | Daño: ".$harry->getDamage();
    echo "\nMejorado: ".$harryVarita->getDescription()." | Daño total: ".$harryVarita->getDamage();
    echo "\nCrossover: ".$harryLightsaber->getDescription()." | Daño total: ".$harryLightsaber->getDamage();
    
    echo "\n\n--- Luke Skywalker ---";
    echo "\nBase: ".$luke->getDescription()." | Daño: ".$luke->getDamage();
    echo "\nClásico: ".$lukeLightsaber->getDescription()." | Daño total: ".$lukeLightsaber->getDamage();
    echo "\nMágico: ".$lukeVarita->getDescription()." | Daño total: ".$lukeVarita->getDamage();
    
    echo "\n\n";
}
