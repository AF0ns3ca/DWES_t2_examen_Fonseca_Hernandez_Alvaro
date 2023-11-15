<?php
//Autor: Alvaro Fonseca Hernandez
//GitHub: https://github.com/AF0ns3ca/DWES_t2_examen_Fonseca_Hernandez_Alvaro.git

// Clase hija que hereda de Articulos
class Pizza extends Articulo
{
    private $ingredientes;


    public function __construct($nombre, $coste, $precio, $contador, $ingredientes)
    {
        parent::__construct($nombre, $coste, $precio, $contador);
        $this->ingredientes = $ingredientes;
    }

    //Getter del parámetro que no hereda de la clase padre
    public function getIngredientes()
    {
        return $this->ingredientes;
    }

    //Setter del parámetro que no hereda de la clase padre
    public function setIngredientes($ingredientes)
    {
        $this->ingredientes = $ingredientes;
    }

    /*Se sobreescribe el metodo toString de la clase padre añadiendo el parametro nuevo donde corresponde*/
    public function __toString()
    {
        return parent::__toString() . " Ingredientes: $this->ingredientes<br>";
    }
}
