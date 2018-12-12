<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Productos</title>
    </head>
    <body>
    <p align="center"><b><font face="Monotype Corsiva" size="6">Facturas</font></b></p>
        <table align="center">
            <tr><td>
                    <form action="./controller/controllerfacturas.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Ver facturas">
                    </form>
                </td>
                <td>
                    <form action="./controller/controllerfacturas.php">
                        <input type="hidden" value="crear" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Crear Factura">
                    </form>
                </td></tr>
        </table>
        <table border="1" align="center">
            <tr bgcolor="#CC6633" bordercolor="#FFFFFF" height="40">
                <th><font color="#FFFFFF">ID</font></th>
                <th><font color="#FFFFFF">REF_CLIENTE</font></th>
                <th><font color="#FFFFFF">FECHA</font></th>
                <th><font color="#FFFFFF">TOTAL</font></th>
                <th><font color="#FFFFFF">ELIMINAR</font></th>
                <th><font color="#FFFFFF">ACTUALIZAR</font></th>
            </tr>
            <?php
            session_start();
           include './model/Factura.php';
//verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listadoclisfac'])) {
                $listado = unserialize($_SESSION['listadoclisfac']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getId() . "</td>";
                    echo "<td>" . $prod->getCedula() . "</td>";
                    echo "<td>" . $prod->getNombres() . "</td>";
                    echo "<td>" . $prod->getApellidos() . "</td>";
//opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='./controller/controllerfacturas.php?opcion=eliminar&codigo=" . $prod->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='./controller/controllerfacturas.php?opcion=cargar&codigo=" . $prod->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </table>
       
        </font>
    </body>
</html>