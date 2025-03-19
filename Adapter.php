<?php
// Ejercicio2/FileAdapter.php
interface Windows7File {
    public function open();
}

class Windows10File {
    public function openNew() { return "Archivo convertido y abierto en Windows 10"; }
}

class Windows10Adapter implements Windows7File {
    private $win10File;
    
    public function __construct(Windows10File $file) {
        $this->win10File = $file;
    }
    
    public function open() {
        return $this->win10File->openNew();
    }
}

// Ejercicio2/ejercicio2.php
function executeExercise2() {
    require_once 'FileAdapter.php';
    
    $archivo = new Windows10Adapter(new Windows10File());
    echo "\n=== RESULTADO ADAPTER ===\n";
    echo $archivo->open()."\n\n";
}
