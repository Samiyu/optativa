<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Cliente</title>
    </head>
    <body>
        <form action="../controller/controllerclientes.php">
            <input type="hidden" value="guardarC" name="opcion">
          
          <table width="200" border="1" bordercolor="#006699" align="center">
            <tr>
              <td><table width="260" border="0" align="center">
  <tr>
    <td colspan="2" bgcolor="#003399"><font color="#FFFFFF">INGRESO DE CLIENTES</font></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="100">ID</td>
    <td width="144"><input type="text" name="codigo"></td>
  </tr>
  <tr>
    <td>Cedula</td>
    <td><input type="text" name="cedula"></td>
  </tr>
  <tr>
    <td>Nombres</td>
    <td><input type="text" name="nombres"></td>
  </tr>
  <tr>
    <td>Apellidos</td>
    <td><input type="text" name="apellidos"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" style="width: 150px; height: 60px;" value="Crear Cliente"></td>
    </tr>
          </table></td>
            </tr>
          </table>
<br>
        </form>
    </body>
</html>