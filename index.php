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
    
    <p align="center"><b><font face="Monotype Corsiva" size="6">Productos</font></b></p>
        <table align="center">
            <tr><td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Consultar listado">
                    </form>
                </td>
                <td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="listar_desc" name="opcion">
                        <input type="submit" style="width: 200px; height: 60px;" value="Consultar listado descendente">
                    </form>
                </td><td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="crear" name="opcion">
                        <input type="submit" style="width: 150px; height: 60px;" value="Crear producto">
                    </form>
                </td></tr>
        </table>
        <table border="1" align="center">
            <tr bgcolor="#0066CC" bordercolor="#FFFFFF" height="40">
                <th><font color="#FFFFFF">CODIGO</font></th>
                <th><font color="#FFFFFF">NOMBRE</font></th>
                <th><font color="#FFFFFF">PRECIO</font></th>
                <th><font color="#FFFFFF">CANTIDAD</font></th>
                <th><font color="#FFFFFF">ELIMINAR</font></th>
                <th><font color="#FFFFFF">ACTUALIZAR</font></th>
            </tr>
            <?php
            session_start();
           include './model/Producto.php';
//verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getCodigo() . "</td>";
                    echo "<td>" . $prod->getNombre() . "</td>";
                    echo "<td>" . $prod->getPrecio() . "</td>";
                    echo "<td>" . $prod->getCantidad() . "</td>";
//opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='controller/controller.php?opcion=eliminar&codigo=" . $prod->getCodigo() . "'>eliminar</a></td>";
                    echo "<td><a href='controller/controller.php?opcion=cargar&codigo=" . $prod->getCodigo() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "";
            }
            ?>
        </table>
        <div align="center">
        <font color="#FF0000">
        <?php
        if (isset($_SESSION['valorTotal'])) {
            echo "VALOR TOTAL DE PRODUCTOS: <b>" . $_SESSION['valorTotal'] . "</b>";
        }
        ?>
        </font>
        </div>
    </body>
</html>