<?php
include '../configAdmin.php';
if (empty($_SESSION)) {
  header('location:administrador.php');
}
$controller = new AdministratorController ();
$entidadHome = $_GET['entidad'];

// Validamos si esta tratando de eliminar un programa
if(isset($_GET['id_delete'])){
  $controller->changeEstadoEntidad($entidadHome, (int)$_GET['id_delete'], 0);
  echo '<script>alert("Se elimino correctamente el programa");</script>';
}

$campos = $controller->emparejamiento($_GET ['entidad']);
switch ($_GET ['entidad']) {
  case 'facultad' :
    $entidades = $controller->downloadFacultades();
    break;
  case 'categoria' :
    $entidades = $controller->downloadCategorias();
    break;
  case 'programa' :
    $entidades = $controller->downloadProgramasByEstado();
    break;
  case 'usuario' :
    $entidades = $controller->downloadUsers();
    break;
  default :
    $entidades = array();
    break;
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
            <?php if (!empty($_SESSION)) { ?>
              <h2>Listado de <?php echo $_GET['entidad'] ?></h2>
              <a href="administrador.php">Regresar</a> | <a href="editEntity.php?entidad=<?php echo $_GET['entidad'] ?>">Nuevo</a>
              <div class="datagrid">
                <table>
                  <thead>
                    <tr>
                      <?php
                      $contMax = 4;
                      $cont = 0;
                      foreach ($campos as $value) {
                        if ($value == 'PASSWORD') {
                          continue;
                        }
                        if ($cont >= $contMax)
                          continue;
                        echo "<th>{$value}</th>";
                        $cont ++;
                      }
                      ?>
                      <th>EDITAR</th>
                      <?php
                      if ($entidadHome == 'programa') {
                        echo '<th>ELIMINAR</th>';
                      }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $class = "";
                    foreach ($entidades as $value) {
                      echo "<tr {$class}>";
                      $contMax = 3;
                      $cont = 0;
                      foreach ($campos as $keyC => $valueC) {
                        $method = "get{$keyC}";
                        if ($cont <= $contMax) {
                          if (is_object($value->$method())) {
                            if ($keyC == 'Dinicio') {
                              echo "<td>" . date('Y-m-d', $value->$method()->getTimestamp()) . "</td>";
                            } else {
                              echo "<td>" . $value->$method()->getVnombre() . "</td>";
                            }
                          } else {
                            if ($keyC == 'Iestado' || $keyC == 'IenvioMail') {
                              $estado = ($value->$method() == 1) ? 'ACTIVO' : 'INACTIVO';
                              echo "<td>" . $estado . "</td>";
                            } else if ($keyC == 'Vpassword') {
                              
                            } else {
                              echo "<td>" . utf8_encode($value->$method()) . "</td>";
                            }
                          }
                        }
                        $cont ++;
                      }
                      echo "<td><a href='editEntity.php?entidad=" . $_GET['entidad'] . "&id=" . $value->getPkId() . "'>Editar</a></td>";
                      if ($entidadHome == 'programa') {
                        echo "<td><a onclick='return ValidarEliminarPrograma(\"" . $_GET['entidad'] . "\");' href='listEntities.php?entidad=" . $_GET['entidad'] . "&id_delete=" . $value->getPkId() . "'>Eliminar</a></td>";
                      }
                      echo "</tr>";
                      $class = (empty($class)) ? 'class="alt"' : '';
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            <?php } ?>
          </div>
          <div class="programa"></div>
        </div>
        <div class="formulario">
          <div class="un_campo">
            <h4 class='saludo'>Bienvenid@ <?php echo $_SESSION['nombre'] ?> </h4>
            <input type="button" value="Salir" class="submit"
                   onclick="logout()" />
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
    <script>
      function ValidarEliminarPrograma(entidad) {
        return confirm('¿Esta seguro que desea eliminar este ' + entidad + '?');
      }
    </script>
  </body>
</html>