<?php
//Autor: Alvaro Fonseca Hernandez
//GitHub: https://github.com/AF0ns3ca/DWES_t2_examen_Fonseca_Hernandez_Alvaro.git

// Clase hija que hereda de Articulo
class Bebida extends Articulo{

    private $alcoholica;

    //Declaracion del constructor con los elementos heredados de la clase padre ademas del nuevo elemento propio de esta clase
    public function __construct($nombre, $coste, $precio, $contador, $alcoholica) {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->alcoholica = $alcoholica;
    }

    //Getter del parámetro que no hereda de la clase padre
    public function getAlcoholica()
    {
        return $this->alcoholica;
    }

    //Setter del parámetro que no hereda de la clase padre
    public function setAlcoholica($alcoholica)
    {
        $this->alcoholica = $alcoholica;
    }

    /*Se sobreescribe el metodo toString de la clase padre añadiendo la propiedad disponible donde corresponde*/
    public function __toString() {
        return parent::__toString() ." Alcoholica: $this->alcoholica<br>";
    }
}
?>