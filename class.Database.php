<?php 
	require_once('class.SqlGenerator.php');
	
	
	class Database extends SqlGenerator {
		
		private static $objPDOInstance;
		
		private $result;
		
		
		public function __construct() {
			if( !self::$objPDOInstance) {
				self::$objPDOInstance = new PDO(Config::$dbDNS, Config::$dbUser, Config::$dbPassword);
				self::$objPDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		}
		
		public function exec() {
			switch($this->getSqlAction()) {
				case 'SELECT': $result = $this->PDOQuery(); break;
				case 'UPDATE':
				case 'INSERT':
				case 'DELETE': $result = $this->PDOExec(); break;
			}
			
            $this->clearLastStatementData(true);
            
			return $result;
		}
		
		
		private function PDOquery() {
			$result = self::$objPDOInstance->query($this->getSql());
			
			return $result->fetchAll(PDO::FETCH_ASSOC);
		}
		
		
		private function PDOExec() {
			$result = self::$objPDOInstance->exec($this->getSql());

			return  $result;
		}
		
		
		public function query($statement) {
			return self::$objPDOInstance->query($statement);
		}
		
		
		public function prepare($statement) {
			return self::$objPDOInstance->prepare($statement);
		}
		
		
	}