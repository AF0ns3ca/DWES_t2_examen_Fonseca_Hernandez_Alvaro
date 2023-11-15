<?php
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

function mostrarMenu($articulos) {
    //utilizamos estos filtros para crear listas que tengan solo los elementos pertenecientes a cada clase
    $pizzas = array_filter($articulos, function($item) {
        return $item instanceof Pizza;
    });
    $bebidas = array_filter($articulos, function($item) {
        return $item instanceof Bebida;
    });
    $otros = array_filter($articulos, function($item) {
        return !($item instanceof Pizza) && !($item instanceof Bebida);
    });
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

function mostrarMasVendidos($articulos) {
    usort($articulos, function($a, $b) {
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

function mostrarMasLucrativos($articulos) {
    usort($articulos, function($a, $b) {
        $beneficioB = ($b->getPrecio()*$b->getContador()) - ($b->getCoste()*$b->getContador());
        $beneficioA = ($a->getPrecio()*$a->getContador()) - ($a->getCoste()*$a->getContador());
        return $beneficioB - $beneficioA;
    });
    
    echo "<h2>¡Los más lucrativos!</h2>";
    foreach ($articulos as $item) {
        $beneficio = ($item->getPrecio()*$item->getContador()) - ($item->getCoste()*$item->getContador());
        echo $item->getNombre() . " - Beneficio: " . $beneficio . "€<br>";
    }
}

require "index-view.php";