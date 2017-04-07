<?php
include '../configAdmin.php';
if (empty ( $_SESSION )) {
	header ( 'location:administrador.php' );
}
$controller = new AdministratorController ();
$campos = $controller->emparejamiento ( $_GET ['entidad'] );
if (! empty ( $_GET ['id'] )) {
	$entidad = $controller->listOneElement ( $_GET ['entidad'], $_GET ['id'] );
}
if (! empty ( $_POST )) {
	if ($controller->editEntidad ( $_POST, $_GET ['entidad'],$_FILES )) {
		?>
<script>
		alert('Registro Exitoso!!');
		location.href='listEntities.php?entidad=<?php echo $_GET['entidad'] ?>';
		</script>
<?php
	}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" charset="utf8" />
<title>Javeriana Educación Continua - Administrador</title>
<link href="Olds/css/generales.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/customAdmin.js"></script>
</head>
<body>
	<div class="container_all">
		<div class="total_width">
			<div class="programas">
				<div class="seleccion">
					<h2>Editar <?php echo $_GET['entidad'] ?></h2>
					<a href="listEntities.php?entidad=<?php echo $_GET['entidad'] ?>">Regresar</a>
                                        <form method="post" name="form" action="" enctype="multipart/form-data" >
						<div class="datagrid">
							<table>
								<thead>
									<tr>
										<th colspan="2">Edición <?php echo $_GET['entidad'] ?></th>
									</tr>
								</thead>
								<tbody>
						<?php
						$class = "class='alt'";
						foreach ( $campos as $key => $value ) {
							$field = "";
							switch ($key) {
								
								case 'PkId' :
									$valueD = (! empty ( $entidad )) ? $entidad->getPkId () : '';
									$field = "<input type='hidden' name='$key' value='$valueD' />$valueD";
									break;
								case 'Iestado' :
									$valueD = (! empty ( $entidad ) && $entidad->getIestado () == 1) ? "selected='selected'" : '';
									$field = "<select name='$key'>
										<option value='0'>Inactivo</option>
										<option value='1' $valueD >Activo</option>
									</select>";
									break;
								case 'IenvioMail' :
									$valueD = (! empty ( $entidad ) && $entidad->getIestado () == 0) ? "selected='selected'" : '';
									$field = "<select name='$key'>
										<option value='1'>Inactivo</option>
										<option value='0' $valueD >Activo</option>
										</select>";
									break;
								case 'Vnombre' :
									$valueD = (! empty ( $entidad )) ? utf8_encode($entidad->getVnombre ()) : '';
									$field = "<input type='text' name='$key' value='$valueD' />";
									break;
								case 'Vemail' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVemail () : '';
									$field = "<input type='text' name='$key' value='$valueD' />";
									break;
								case 'Ihoras' :
									$valueD = (! empty ( $entidad )) ? $entidad->getIhoras () : '';
									$field = "<input type='number' name='$key' value='$valueD' />";
									break;
								case 'VurlImagen' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVurlImagen () : '';
									$field = "<input type='file' name='$key' value='$valueD' />";
									break;
								case 'VurlVideo' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVurlVideo () : '';
									$field = "<input type='text' name='$key' value='$valueD' />";
									break;
								case 'Vtelefono' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVtelefono () : '';
									$field = "<input type='text' name='$key' value='$valueD' />";
									break;
								case 'Ivalor' :
									$valueD = (! empty ( $entidad )) ? $entidad->getIvalor () : '';
									$field = "<input type='number' name='$key' value='$valueD' />";
									break;
								case 'Vemail' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVemail () : '';
									$field = "<input type='text' name='$key' value='$valueD' />";
									break;
								case 'Vperfil' :
									$valueD = (! empty ( $entidad )) ? utf8_encode($entidad->getVperfil ()) : '';
									$field = "<textarea name='$key' rows='6' cols='40'>$valueD</textarea>";
									break;
								case 'Vdescripcion' :
									$valueD = (! empty ( $entidad )) ? utf8_encode($entidad->getVdescripcion ()) : '';
									$field = "<textarea name='$key' rows='6' cols='40'>$valueD</textarea>";
									break;
								case 'Vpassword' :
									$valueD = (! empty ( $entidad )) ? $entidad->getVpassword () : '';
									$field = "<input type='password' name='$key' value='$valueD' />";
									break;
								case 'Vdetalle' :
									$valueD = (! empty ( $entidad )) ? utf8_encode($entidad->getVdetalle ()) : '';
									$field = "<textarea name='$key' rows='6' cols='40'>$valueD</textarea>";
									break;
								case 'Dinicio' :
									$valueD = (! empty ( $entidad )) ? date ( 'Y-m-d', $entidad->getDinicio ()->getTimestamp () ) : '';
									$field = "<input name='$key' id='$key' value='$valueD' type='date' />";
									break;
								case 'LpjFacultadPk' :
									$facultades = $controller->downloadFacultades ();
									$field = "<select name='$key'>";
									foreach ( $facultades as $keyC => $valueC ) {
										if ($valueC->getIestado () == 1) {
											$valueD = ((! empty ( $entidad )) && $valueC->getPkId () == $entidad->getLpjFacultadPk ()->getPkId ()) ? 'selected="selected"' : '';
											$field .= "<option $valueD value='{$valueC->getPkId ()}'>{$valueC->getVnombre()}</option>";
										}
									}
									$field .= "</select>";
									break;
								case 'LpjCategoriaPk' :
									$facultades = $controller->downloadCategorias ();
									$field = "<select name='$key'>";
									foreach ( $facultades as $keyC => $valueC ) {
										if ($valueC->getIestado () == 1) {
											$valueD = (! empty ( $entidad ) && $valueC->getPkId () == $entidad->getLpjCategoriaPk ()->getPkId ()) ? 'selected="selected"' : '';
											$field .= "<option $valueD value='{$valueC->getPkId ()}'>{$valueC->getVnombre()}</option>";
										}
									}
									$field .= "</select>";
									break;
								default :
									;
									break;
							}
							echo <<<ECHO
							<tr {$class}>
								<td><b>$value</b></td>
								<td>$field</td>
							</tr>
ECHO;
							$class = (empty ( $class )) ? 'class="alt"' : '';
						}
						?>
						<tr class='alt'>
										<td colspan="2"><input type="submit" value="Guardar Cambios"
											class="submit" /></td>
									</tr>
								</tbody>
							</table>
					
					</form>
				</div>
			</div>
			<div class="programa"></div>
		</div>
		<div class="formulario">
			<div class="un_campo">
				<h4 class='saludo'>Bienvenid@ <?php echo $_SESSION['nombre'] ?> </h4>
				<input type="button" value="Salir" class="submit" onclick="logout()" />
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	</div>
	<div class="container_all_footer">
		<div class="total_width">
			<p class="footer">Pontificia Universidad Javeriana Bogot&aacute;</p>
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>