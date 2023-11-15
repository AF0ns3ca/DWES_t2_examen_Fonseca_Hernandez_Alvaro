<?php
//Autor: Alvaro Fonseca Hernandez
//GitHub: https://github.com/AF0ns3ca/DWES_t2_examen_Fonseca_Hernandez_Alvaro.git

//Archivo que funcionara como controlador
require "Articulo.php";
require "Pizza.php";
require "Bebida.php";

// solicitar los archivos "articulo.php", "bebida.php", "pizza.php";

// Inicialización de los artículos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];

// Ejemplo de uso

function mostrarMenu($articulos)
{
    //utilizamos estos filtros para crear listas que tengan solo los elementos pertenecientes a cada clase
    $pizzas = array_filter($articulos, function ($item) {
        return $item instanceof Pizza;
    });
    $bebidas = array_filter($articulos, function ($item) {
        return $item instanceof Bebida;
    });
    $otros = array_filter($articulos, function ($item) {
        return !($item instanceof Pizza) && !($item instanceof Bebida);
    });

    //Ahora imprimimos por pantalla las diferentes listas resultantes de los anteriores filtros que serán cada uno de los diferentes tipos de elementos
    echo "<h2>Pizzas</h2>";
    foreach ($pizzas as $pizza) {
        echo $pizza->getNombre() . "<br/>";
    }
    echo "<br><h2>Bebidas</h2>";
    foreach ($bebidas as $bebida) {
        echo $bebida->getNombre() . "<br/>";
    }
    echo "<br><h2>Otros</h2>";
    foreach ($otros as $otro) {
        echo $otro->getNombre() . "<br/>";
    }
}

function mostrarMasVendidos($articulos)
{

    //Utilizamos la funcion usort para ordenar dentro de articulos los elementos segun el criterio que decidamos, en este caso ordenamos por contador ya que queremos saber los más vendidos, que seran aquellos que tengan el valor del contador mas alto
    usort($articulos, function ($a, $b) {
        return $b->getContador() - $a->getContador();
    });

    //Con esto lo que hacemos es sacar los 3 más vendidos, limitando a esas vueltas el bucle for aunque con la funcion usort ordenasemos toda la lista
    echo "<h2>Los más vendidos</h2><br>";
    for ($i = 0; $i < 3; $i++) {
        echo $articulos[$i]->getNombre() . " - Vendidos: " . $articulos[$i]->getContador() . "<br>";
    }

    //Con esto saldrian todos ordenados, pero solo queremos los 3 primeros
    // foreach ($articulos as $item) {
    //     echo $item->getNombre() . " - Vendidos:" . $item->getContador() . "<br>";
    // }
}

function mostrarMasLucrativos($articulos)
{

    //Utilizamos la funcion usort para ordenar dentro de articulos los elementos segun el criterio que decidamos, en este caso ordenamos por beneficio

    usort($articulos, function ($a, $b) {
        //Para obtener el beneficio tenemos que multiplicar el precio por el contador y restarle el resultado de multiplicar el coste por el contador, de ese modo restamos la ganancia total del coste total de cada producto y nos queda el beneficio
        $beneficioB = ($b->getPrecio() * $b->getContador()) - ($b->getCoste() * $b->getContador());
        $beneficioA = ($a->getPrecio() * $a->getContador()) - ($a->getCoste() * $a->getContador());
        return $beneficioB - $beneficioA;
    });


    //Imprimimos por pantalla con el formato que queremos la lista de articulos que ahora esta ordenada segun el beneficio
    echo "<h2>¡Los más lucrativos!</h2>";
    foreach ($articulos as $item) {
        //Hacemos la variable beneficio para no tener que escribir toda la expresion varias veces
        $beneficio = ($item->getPrecio() * $item->getContador()) - ($item->getCoste() * $item->getContador());
        echo $item->getNombre() . " - Beneficio: " . $beneficio . "€<br>";
    }
}

require "index-view.php";
