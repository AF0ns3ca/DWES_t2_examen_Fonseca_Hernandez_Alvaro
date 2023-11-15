<?php
// Modelo. Clase libro que se instanciará en la vista y a partir de la cual se generaran los objetos libro
class Pizza extends Articulo{
    private $ingredientes;
    public function __construct($nombre, $coste, $precio, $contador, $ingredientes) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }

    /*Se sobreescribe el metodo toString de la clase padre añadiendo la propiedad disponible donde corresponde*/
    public function __toString() {
        return parent::__toString() ." Ingredientes: $this->ingredientes<br>";
    }
}
?>