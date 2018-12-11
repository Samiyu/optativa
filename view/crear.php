<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear producto</title>
    </head>
    <body>
        <form action="../controller/controller.php">
            <input type="hidden" value="guardar" name="opcion">
          
          <table width="200" border="1" bordercolor="#006699" align="center">
            <tr>
              <td><table width="260" border="0" align="center">
  <tr>
    <td colspan="2" bgcolor="#003399"><font color="#FFFFFF">INGRESO DE PRODUCTOS</font></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td width="100">Codigo</td>
    <td width="144"><input type="text" name="codigo"></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><input type="text" name="nombre"></td>
  </tr>
  <tr>
    <td>Precio</td>
    <td><input type="text" name="precio"></td>
  </tr>
  <tr>
    <td>Cantidad</td>
    <td><input type="text" name="cantidad"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" style="width: 150px; height: 60px;" value="Crear Producto"></td>
    </tr>
          </table></td>
            </tr>
          </table>
<br>
        </form>
    </body>
</html>