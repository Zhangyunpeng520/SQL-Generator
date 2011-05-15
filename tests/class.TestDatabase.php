<?php 

	require_once('PHPUnit/Framework.php');
	require_once('../class.Database.php');
	require_once('../class.Config.php');
	
	
	class TestDatabase extends PHPUnit_Framework_TestCase {
		
		private $objDatabase;
		
		
		public function setUp() {
			$this->objDatabase = new Database();
		}
		
		
		public function tearDown() {
			unset($this->objobjDatabase);
		}
		
		
		public function testSelect() {
			$result = $this->objDatabase
						   ->select('name, lastname')
						   ->from('users')
						   ->where('user_id', '> 10')
						   ->getSql();
			$expected = 'SELECT name, lastname FROM users WHERE user_id > 10';
			
			$this->assertEquals($result,$expected);
		}

		
		public function testSetSql() {
			$sql = 'SELECT * FORM users WHERE user_id IN (1, 3)';
			
			$result = $this->objDatabase->setSql($sql)->getSql();
			
			$this->assertEquals($sql, $result);
		}
	}