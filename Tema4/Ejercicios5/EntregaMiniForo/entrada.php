<form name='entrada' method="POST">
<table>
<tr>
<td>Nombre:</td><td> <input type="text" name="nombre" 
    value="<?=(isset($_REQUEST['nombre']))?htmlspecialchars($_REQUEST['nombre']):''?>"></td></tr>
<tr>
<td>Contraseña: </td><td><input type="password" name="contraseña"
    value="<?=(isset($_REQUEST['contraseña']))?htmlspecialchars($_REQUEST['contraseña']):''?>"></td>
</tr>
</table>
<input type="submit" name="orden" value="Entrar">
</form>