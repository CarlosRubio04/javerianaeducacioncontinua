<?php

/**
 * @author John
 * 
 */
class LandingController {

    protected $_em;

    function __construct() {
        $doctrine = new DoctrineConector(USER, PASS, HOST, DBNAME, array(
            APPLICATION_PATH . '/library/Custom/Models/xml'
        ));
        $this->_em = $doctrine->getEm();
    }

    function loadFacultades() {
        return $this->_em->getRepository('LpjFacultad')->findBy(array(
                    "iestado" => true
        ));
    }

    function loadCategorias($facultad) {
        $query = $this->_em->createQuery('SELECT a '
                . 'FROM LpjPrograma u, LpjCategoria a, LpjFacultad e '
                . 'WHERE u.lpjCategoriaPk = a.pkId and '
                . 'u.lpjFacultadPk = e.pkId  '
                . 'AND a.iestado = 1 '
                . 'AND u.iestado = 1'
                . 'AND e.pkId = ' . $facultad);
        return $query->getResult();
    }

    function loadProgramas($categoria, $facultad) {
        if (!empty($categoria) && !empty($facultad)) {
            return $this->_em->getRepository('LpjPrograma')->findBy(array(
                        "iestado" => true,
                        "lpjCategoriaPk" => $categoria,
                        "lpjFacultadPk" => $facultad
            ));
        } else if (empty($categoria) && empty($facultad)) {
            return $this->_em->getRepository('LpjPrograma')->findBy(array(
                        "iestado" => true
            ));
        }
    }

    function loadPrograma($programa) {
        return $this->_em->find('LpjPrograma', $programa);
    }

    function getNombreMes($mes) {
        switch ($mes) {
            case '01' :
                return "Enero";
            case '02' :
                return "Febrero";
            case '03' :
                return "Marzo";
            case '04' :
                return "Abril";
            case '05' :
                return "Mayo";
            case '06' :
                return "Junio";
            case '07' :
                return "Julio";
            case '08' :
                return "Agosto";
            case '09' :
                return "Septiembre";
            case '10' :
                return "Octubre";
            case '11' :
                return "Noviembre";
            case '12' :
                return "Diciembre";
        }
    }

    function sendMail($args) {
        $programa = $this->_em->find('LpjPrograma', $args ['programa']);
        if (!empty($programa)) {
            try {
                $registrado = new LpjRegistrado ();
                $registrado->setVnombre($args ['nombre']);
                $registrado->setVapellido($args ['apellidos']);
                $registrado->setVemail($args ['email']);
                $registrado->setIcelular($args ['celular']);
                $registrado->setLpjProgramaPk($programa);
                $registrado->setIcontactar(!empty($args ['contactar']) ? 1 : 0 );
                $registrado->setVtarget($args ['target']);
                $registrado->setVip($args ['ip']);
                $registrado->setDtfechaRegistro(new DateTime());
                $this->_em->persist($registrado);
                $this->_em->flush();
                $mails = $this->_em->getRepository('LpjConfigmail')->findBy(array(
                    'iestado' => true,
                    'ienvioMail' => true
                ));

                $mail = new PHPMailer ();
                $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
                $mail->IsSMTP();
                $mail->IsHTML(true); //Verificamos que lo que se va a enviar esta en formato HTML
                //$mail->SMTPSecure = 'tls';
                //$mail->SMTPDebug  = 2;
                //$mail->SMTPAuth = true; 
                $mail->Host = SENDER_HOST; // sets the SMTP server
                //$mail->Port = SENDER_PORT;                    // set the SMTP port for the GMAIL server
                //$mail->Username = SENDER_MAIL; // SMTP account username
                //$mail->Password = SENDER_PASS;        // SMTP account password
                $mail->SetFrom(SENDER_MAIL, 'Javeriana Educacion Continua');
                $mail->Subject = "Solicitud de Contacto Javeriana Educacion Continua";
                $mail->AltBody = "";
                $content = <<<AA
<html>
		<body>
			<h1>Solicitud de contacto Javeriana Educacion Continua</h1>
			<p>
				Se ha realizado una solicitud de informaci&oacute;n desde la p&aacute;gina de Javeriana Educacion Continua:
                                <br><strong>Nombre: </strong>{$registrado->getVnombre()}<br>
                                <strong>Apellidos: </strong>{$registrado->getVapellido()}<br>
                                <strong>Email: </strong>{$registrado->getVemail()}<br>
                                <strong>Celular: </strong>{$registrado->getIcelular()}<br>
                                <strong>Programa: </strong>{$registrado->getLpjProgramaPk()->getVnombre()}<br>
                                <strong>Facultad: </strong>{$registrado->getLpjProgramaPk()->getLpjFacultadPk()->getVnombre()}<br>
                                <strong>Categor&iacute;a: </strong>{$registrado->getLpjProgramaPk()->getLpjCategoriaPk()->getVnombre()}<br>
			</p>
			<p></p>
			<p></p>
			<p>Javeriana Educacion Continua</p>
		</body>
</html>
AA;
                $mail->MsgHTML($content);
                foreach ($mails as $mailD) {
                    $mail->AddAddress($mailD->getVemail(), $mailD->getVnombre());
                }
                if ($mail->Send()) {
                    return true;
                } else {
                    echo $mail->ErrorInfo;
                    return false;
                }
                return true;
            } catch (Exception $e) {
                print_r($e->getMessage());
                return false;
            }
        }
    }

    function __destruct() {
        
    }

}

?>
