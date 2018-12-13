<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CRUD Productos</title>
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
    
        <p align="center"><b><font face="Monotype Corsiva" size="6">Proveedores</font></b></p>
        <table align="center">
            <tr><td>
                    <form action="controller/controllerf.php">
                        <input type="hidden" value="listarF" name="opc">
                        <input type="submit" style="width: 150px; height: 60px;" value="Ver listado">
                    </form>
                </td>
                <td>
                    <form action="controller/controllerf.php">
                        <input type="hidden" value="crearF" name="opc">
                        <input type="submit" style="width: 150px; height: 60px;" value="Crear Nuevo">
                    </form>
                </td></tr>
        </table>
        <table border="1" align="center">
            <tr bgcolor="#CC6633" bordercolor="#FFFFFF" height="40">
                <th><font color="#FFFFFF">ID</font></th>
                <th><font color="#FFFFFF">NOMBRE</font></th>
                <th><font color="#FFFFFF">DIRECCION</font></th>
                <th><font color="#FFFFFF">TELEFONO</font></th>
                <th><font color="#FFFFFF">EMAIL</font></th>
                <th><font color="#FFFFFF">ELIMINAR</font></th>
                <th><font color="#FFFFFF">ACTUALIZAR</font></th>

            </tr>
            <?php
            session_start();
            include './model/Factura.php';
//verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listadofac'])) {
                $listadof = unserialize($_SESSION['listadofac']);
                foreach ($listadof as $p) {
                    echo "<tr>";
                    echo "<td>" . $p->getId() . "</td>";
                    echo "<td>" . $p->getRef_cliente() . "</td>";
                    echo "<td>" . $p->getFecha() . "</td>";
                    echo "<td>" . $p->getTotal() . "</td>";
                    echo "<td>" . $p->getEmail() . "</td>";
                    echo "<td><a href='./controller/controllerf.php?opc=eliminarF&id=" . $p->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='./controller/controllerf.php?opc=actualizarF&id=" . $p->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo " ";
            }
            ?>
        </table>

        </font>
    </body>
</html>