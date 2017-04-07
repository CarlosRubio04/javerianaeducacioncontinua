<?php
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
// replace with file to your own project bootstrap
require_once 'doctrine.php';

$em1 = new DoctrineConector('root', '123456', 'localhost', 'landing_javeriana', 
        array(
                'Custom/Models/xml'
        ));

$em = $em1->getEm();

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(
        array(
                'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper(
                        $em->getConnection()),
                'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper(
                        $em)
        ));
$commands = array();

$directorio = opendir("Custom/Models/entities"); // ruta actual
while ($archivo = readdir($directorio)) // obtenemos un archivo y luego otro //
                                        // sucesivamente
{
    if (! is_dir($archivo))     // verificamos si es o no un directorio
    {
        include "Custom/Models/entities/".$archivo; // de ser un directorio lo envolvemos
                               // entre corchetes
    }
}

\Doctrine\ORM\Tools\Console\ConsoleRunner::run($helperSet, $commands);
