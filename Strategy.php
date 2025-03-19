<?php
// Ejercicio4/OutputStrategy.php
interface OutputStrategy {
    public function format($message);
}

class ConsoleOutput implements OutputStrategy {
    public function format($message) {
        echo "=== Consola ===\n$message\n\n";
    }
}

class JsonOutput implements OutputStrategy {
    public function format($message) {
        echo "=== JSON ===\n".json_encode(['fecha' => date('Y-m-d'), 'contenido' => $message])."\n\n";
    }
}

class TxtOutput implements OutputStrategy {
    public function format($message) {
        $filename = "tmp/salida_".date('Ymd_His').".txt";
        if (!is_dir('tmp')) {
            mkdir('tmp', 0755, true);
        }
        file_put_contents($filename, "=== Archivo TXT ===\n$message");
        echo "=== TXT ===\nArchivo generado: $filename\n\n";
    }
}

class MessageContext {
    private $strategy;
    
    public function setStrategy(OutputStrategy $strategy) {
        $this->strategy = $strategy;
    }
    
    public function show($message) {
        $this->strategy->format($message);
    }
}

// Ejercicio4/ejercicio4.php
function executeExercise4() {
    require_once 'OutputStrategy.php';
    
    $context = new MessageContext();
    $message = readline("Ingrese el mensaje a mostrar: ");
    
    // Probamos todas las estrategias
    $context->setStrategy(new ConsoleOutput());
    $context->show($message);
    
    $context->setStrategy(new JsonOutput());
    $context->show($message);
    
    $context->setStrategy(new TxtOutput());
    $context->show($message);
    
    echo "¡Tres formatos generados!\n";
}
