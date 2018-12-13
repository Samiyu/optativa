<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Clientes</title>
    </head>
    <body>
        <table width="100%" border="0">
            <tr>
                <td height="55" colspan="4"><table width="588" border="0" align="center">
                        <tr>
                            <td width="25%" background="imgs/fondomenuinferior.png" align="center"><a href="./clientes.php" target="cuerpoby"><div style="width: 100%; height: 50px; margin-top: 20px"  ><font color="#FFFFFF"><b>CLIENTES</b></font></div></a></td>
                            <td width="23%" background="imgs/fondomenuinferior.png" align="center"><a href="./index.php" target="cuerpoby"><div style="width: 100%; height: 50px; margin-top: 20px" ><font color="#FFFFFF"><b>PRODUCTOS</b></font></div></a></td>
                            <td width="25%" background="imgs/fondomenuinferior.png" align="center"><a href="./facturas.php" target="cuerpoby"><div style="width: 100%; height: 50px; margin-top: 20px" ><font color="#FFFFFF"><b>PROVEEDORES</b></font></div></a></td>
                        </tr>
                    </table></td>
            </tr>
            
        </table>
   
    <p align="center"><b><font face="Monotype Corsiva" size="6">Clientes</font></b></p>
        <table align="center">
            <tr><td>
                    <form action="controller/controllerc.php">
                        <input type="hidden" value="listarC" name="op">
                        <input type="submit" style="width: 150px; height: 60px;" value="Ver clientes">
                    </form>
                </td><td>
                    <form action="controller/controllerc.php">
                        <input type="hidden" value="crearC" name="op">
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
                $listadoC = unserialize($_SESSION['listadoclis']);
                foreach ($listadoC as $pro) {
                    echo "<tr>";
                    echo "<td>" . $pro->getId() . "</td>";
                    echo "<td>" . $pro->getCedula() . "</td>";
                    echo "<td>" . $pro->getNombres() . "</td>";
                    echo "<td>" . $pro->getApellidos() . "</td>";
//opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='controller/controllerc.php?op=eliminarC&id=" . $pro->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='controller/controllerc.php?op=cargarC&id=" . $pro->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "";
            }
            ?>
        </table>
       
    </body>
</html>