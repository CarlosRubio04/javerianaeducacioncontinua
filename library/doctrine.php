<?php
require_once "vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
class DoctrineConector {
	protected $_user;
	protected $_pass;
	protected $_dbname;
	protected $_host;
	protected $_paths;
	protected $_isDevMode;
	function DoctrineConector($user, $pass, $host, $dbname, $paths, $isDevMode = false) {
		$this->_user = $user;
		$this->_pass = $pass;
		$this->_host = $host;
		$this->_dbname = $dbname;
		$this->_paths = $paths;
		$this->_isDevMode = $isDevMode;
	}
	function getEm() { // the connection configuration
		$dbParams = array (
				'driver' => 'pdo_mysql',
				'user' => $this->_user,
				'password' => $this->_pass,
				'dbname' => $this->_dbname,
				'host' => $this->_host 
		);
		$config = Setup::createXMLMetadataConfiguration ( $this->_paths, $this->_isDevMode );
		$entityManager = EntityManager::create ( $dbParams, $config );
		return $entityManager;
	}
}