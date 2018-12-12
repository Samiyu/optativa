<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Clientes</title>
    </head>
    <body>
    <p align="center"><b><font face="Monotype Corsiva" size="6">Clientes</font></b></p>
        <table align="center">
            <tr><td>
                    <form action="./controller/controller.php">
                        <input type="hidden" value="listarC" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Ver clientes">
                    </form>
                </td><td>
                    <form action="./controller/controller.php">
                        <input type="hidden" value="crearC" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Crear Cliente">
                    </form>
                </td></tr>
        </table>
        <table border="1" align="center">
            <tr bgcolor="#FF9900" bordercolor="#FFFFFF" height="40">
                <th><font color="#000">CODIGO</font></th>
                <th><font color="#000">CEDULA</font></th>
                <th><font color="#000">NOMBRES</font></th>
                <th><font color="#000">APELLIDOS</font></th>
                <th><font color="#000">ELIMINAR</font></th>
                <th><font color="#000">ACTUALIZAR</font></th>
            </tr>
            <?php
            session_start();
           include './model/Cliente.php';
//verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listadoclis'])) {
                $listado = unserialize($_SESSION['listadoclis']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getId() . "</td>";
                    echo "<td>" . $prod->getCedula() . "</td>";
                    echo "<td>" . $prod->getNombres() . "</td>";
                    echo "<td>" . $prod->getApellidos() . "</td>";
//opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='./controller/controller.php?opcion=eliminarC&id=" . $prod->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='./controller/controller.php?opcion=cargarC&id=" . $prod->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "";
            }
            ?>
        </table>
       
        </font>
    </body>
</html>