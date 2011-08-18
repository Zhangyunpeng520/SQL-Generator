<?php 

	require_once '../class.Database.php';
	require_once '../class.Config.php';
	require_once 'class.TestDatabase.php';
	require_once('PHPUnit/TextUI/TestRunner.php');
	
	$suite = new PHPUnit_Framework_TestSuite();
	$suite->addTestSuite('TestDatabase');
	
	echo '<pre>';
	
	$objTestest = PHPUnit_TextUI_TestRunner::run($suite);
	
