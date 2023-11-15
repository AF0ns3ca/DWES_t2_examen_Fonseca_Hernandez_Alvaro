<?php
//Autor: Alvaro Fonseca Hernandez
//GitHub: https://github.com/AF0ns3ca/DWES_t2_examen_Fonseca_Hernandez_Alvaro.git

// Clase Padre
class Articulo
{
    private $nombre;
    private $coste;
    private $precio;
    private $contador;

    //Constructor por parametros de la clase padre
    public function __construct($nombre, $coste, $precio, $contador)
    {
        $this->nombre = $nombre;
        $this->coste = $coste;
        $this->precio = $precio;
        $this->contador = $contador;
    }

    // Getters para obtener los valores si fuese necesario
    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCoste()
    {
        return $this->coste;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getContador()
    {
        return $this->contador;
    }

    // Setters para modificar los valores si fuese necesario
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCoste($coste)
    {
        $this->coste = $coste;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setContador($contador)
    {
        $this->contador = $contador;
    }

    //Metodo toString en caso de que fuese necesario imprimir todo el objeto
    public function __toString()
    {
        return "Nombre: " . $this->nombre . ", Coste: " . $this->coste . ", Precio: " . $this->precio . ", Contador: " . $this->contador;
    }
}
