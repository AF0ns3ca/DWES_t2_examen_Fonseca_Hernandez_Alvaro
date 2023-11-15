<?php
// Modelo. Clase libro que se instanciará en la vista y a partir de la cual se generaran los objetos libro
class Bebida extends Articulo{
    private $alcoholica;
    public function __construct($nombre, $coste, $precio, $contador, $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = $alcoholica;
    }

    /*Se sobreescribe el metodo toString de la clase padre añadiendo la propiedad disponible donde corresponde*/
    public function __toString() {
        return parent::__toString() ." Alcoholica: $this->alcoholica<br>";
    }
}
?>