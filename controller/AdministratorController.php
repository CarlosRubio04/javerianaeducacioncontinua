<?php

class AdministratorController {

  protected $_em;

  function __construct() {
    $doctrine = new DoctrineConector(USER, PASS, HOST, DBNAME, array(
        APPLICATION_PATH . '/library/Custom/Models/xml'
    ));
    $this->_em = $doctrine->getEm();
  }

  function downloadFacultades() {
    return $this->_em->getRepository('LpjFacultad')->findAll();
  }

  function downloadCategorias() {
    return $this->_em->getRepository('LpjCategoria')->findAll();
  }

  function downloadProgramas() {
    return $this->_em->getRepository('LpjPrograma')->findAll();
  }

  function downloadProgramasByEstado($estado = 1) {
    return $this->_em->getRepository('LpjPrograma')->findBy(array(
          'iestado' => $estado,
        ), array('pkId' => 'DESC'));
  }

  function downloadRegisters() {
    return $this->_em->getRepository('LpjRegistrado')->findAll();
  }

  function downloadUsers() {
    return $this->_em->getRepository('LpjConfigmail')->findAll();
  }

  function loginUser($user, $pass) {
    $user = $this->_em->getRepository('LpjConfigmail')->findOneBy(array(
        "vemail" => $user,
        "vpassword" => md5($pass)
    ));
    if (!empty($user)) {
      $_SESSION ['nombre'] = $user->getVnombre();
      $_SESSION ['email'] = $user->getVemail();
      return $user;
    } else {
      return null;
    }
  }

  function logoutUser() {
    unset($_SESSION);
    session_destroy();
    return true;
  }

  function __destruct() {
    
  }

  function listOneElement($table, $id) {
    switch ($table) {
      case 'facultad' :
        return $this->_em->find('LpjFacultad', $id);
        break;
      case 'categoria' :
        return $this->_em->find('LpjCategoria', $id);
        break;
      case 'programa' :
        return $this->_em->find('LpjPrograma', $id);
        break;
      case 'usuario' :
        return $this->_em->find('LpjConfigmail', $id);
        break;
    }
  }

  function emparejamiento($table) {
    switch ($table) {
      case 'facultad' :
      case 'categoria' :
        return array(
            "PkId" => 'ID',
            "Vnombre" => 'NOMBRE',
            "Iestado" => 'ESTADO'
        );
        break;
      case 'programa' :
        return array(
            "PkId" => 'ID',
            "Vnombre" => 'NOMBRE',
            "Iestado" => 'ESTADO',
            'Ihoras' => 'HORAS',
            'VurlImagen' => 'IMAGEN',
            'VurlVideo' => 'VIDEO',
            'Vtelefono' => 'TELEFONO',
            'Ivalor' => 'PRECIO',
            'Dinicio' => 'FECHA DE INICIO',
            'LpjFacultadPk' => 'FACULTAD',
            'LpjCategoriaPk' => 'CATEGORIA',
            'Vperfil' => 'PERFIL',
            'Vdescripcion' => 'EN QUE CONSISTE',
            'Vdetalle' => 'POR QUE HACERLO'
        );
        break;
      case 'usuario' :
        return array(
            "PkId" => 'ID',
            "Vnombre" => 'NOMBRE',
            "Iestado" => 'ESTADO',
            'Vemail' => 'EMAIL',
            'IenvioMail' => 'BLOQUEO_ENVIO_CORREO',
            "Vpassword" => 'PASSWORD',
        );
        break;
        break;
    }
  }

  function editEntidad($data, $table, $files = array()) {
//        print_r($data);
//        print_r($files);
    if (empty($data ['PkId'])) {
      switch ($table) {
        case 'facultad' :
          $entidad = new LpjFacultad ();
          break;
        case 'categoria' :
          $entidad = new LpjCategoria ();
          break;
        case 'programa' :
          $entidad = new LpjPrograma ();
          break;
        case 'usuario' :
          $entidad = new LpjConfigmail ();
          break;
      }
    } else {
      $entidad = $this->listOneElement($table, $data ['PkId']);
    }
    foreach ($data as $key => $value) {
//            print_r($data);
      if ($key != 'PkId') {
        if ($key == 'LpjFacultadPk' || $key == 'LpjCategoriaPk') {
          $tabla_dep = ($key == 'LpjFacultadPk') ? 'facultad' : 'categoria';
          $value = $this->listOneElement($tabla_dep, $value);
        } else if ($key == 'Dinicio') {
          $value = new DateTime($value);
        } else if ($key == 'Vpassword') {
          $value = md5($value);
        } else {
          $value = utf8_decode($value);
        }
        $method = "set$key";
        $entidad->$method($value);
      }
    }
    if (!empty($files)) {
      foreach ($files as $key => $value) {
        if (!empty($value['tmp_name'])) {
          move_uploaded_file($value['tmp_name'], __DIR__ . '/../public/images/custom_files/' . $value['name']);
          $method = "set$key";
          $url_define = explode('public', $_SERVER['REQUEST_URI']);
          $entidad->$method($url_define[0] . 'public/images/custom_files/' . $value['name']);
        }
      }
    }
    $this->_em->persist($entidad);
    try {
      $this->_em->flush();

      return true;
    } catch (Exception $e) {
      print_r($e->getMessage());
      die;
      return false;
    }
  }
  
  // Ocultams un programa
  function changeEstadoEntidad($table = 'programa', $id = 0, $iestado = 0) {

    $entidad = $this->listOneElement($table, $id);
    $entidad->setIestado($iestado);
    $this->_em->persist($entidad);
    try {
      $this->_em->flush();
      return true;
    } catch (Exception $e) {
      print_r($e->getMessage());
      die;
      return false;
    }
  }

}
