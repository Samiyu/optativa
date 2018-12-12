<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Cliente</title>
    </head>
    <body>
        <?php
        include '../model/Cliente.php';
//obtenemos los datos de sesion:
        session_start();
        $cliente = $_SESSION['cliente'];
        ?>
        <form action="../controller/controllerc.php">
            <input type="hidden" value="actualizarC" name="opcion">
            <!-- Utilizamos pequeños scripts PHP para obtener los valores del producto: -->
            <input type="hidden" value="
             <?php echo $cliente->getId(); ?>" name="id">
            Id:<b><?php echo $cliente->getId(); ?></b><br>
            Cedula:<input type="text" name="cedula" value="<?php echo $cliente->getCedula(); ?>"><br>
            Nombres:<input type="text" name="nombres" value="<?php echo $cliente->getNombres(); ?>"><br>
            Apellidos:<input type="text" name="apellidos" value="<?php echo $cliente->getApellidos(); ?>"><br>
            <input type="submit" value="Actualizar">
        </form>
    </body>
</html>