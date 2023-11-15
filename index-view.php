<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
</head>

<body>
    <?php
        echo "<h1>Nuestro ménu</h1>";
        mostrarMenu($articulos);
        mostrarMasVendidos($articulos);
        mostrarMasLucrativos($articulos);
    ?>
</body>

</html>