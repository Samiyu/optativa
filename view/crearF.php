<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Proveedor</title>
    </head>
    <body>
        <form action="../controller/controllerf.php">
            <input type="hidden" value="guardarF" name="opc">

            <table width="200" border="1" bordercolor="#006699" align="center">
                <tr>
                    <td><table width="260" border="0" align="center">
                            <tr>
                                <td colspan="2" bgcolor="#003399"><font color="#FFFFFF">CREAR PROVEEDOR</font></td>
                            </tr>
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="100">ID</td>
                                <td width="144"><input type="text" name="id"></td>
                            </tr>
                           <tr>
                                <td>Nombre: </td>
                                <td><input type="text" name="nombre"></td>
                            </tr>
                            <tr>
                                <td>Direccion: </td>
                                <td><input type="text" name="direccion"></td>
                            </tr>
                            <tr>
                                <td>Telefono: </td>
                                <td><input type="text" name="telefono"></td>
                            </tr>
                            <tr>
                                <td>Email: </td>
                                <td><input type="text" name="email"></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><input type="submit" style="width: 150px; height: 60px;" value="Crear "></td>
                            </tr>
                        </table></td>
                </tr>
            </table>
            <br>
        </form>
    </body>
</html>