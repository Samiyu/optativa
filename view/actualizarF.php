<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Proveedor</title>
    </head>
    <body>
        <?php
        include '../model/Factura.php';
//obtenemos los datos de sesion:
        session_start();
        $factura = $_SESSION['factura'];
        ?>
        <form action="../controller/controllerf.php">
            <input type="hidden" value="actualizarF" name="opc">
            <!-- Utilizamos pequeños scripts PHP para obtener los valores del producto: -->
            <input type="hidden" value="
                <?php echo $factura->getId(); ?>" name="id">
            ID:<b><?php echo $factura->getId(); ?></b><br>
            Nombre:<input type="text" name="nombre" value="<?php echo $factura->getNombre(); ?>"><br>
            Direccion:<input type="text" name="direccion" value="<?php echo $factura->getDireccion(); ?>"><br>
            Telefono:<input type="text" name="telefono" value="<?php echo $factura->getTelefono(); ?>"><br>
            Email:<input type="text" name="email" value="<?php echo $factura->getEmail(); ?>"><br>
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>