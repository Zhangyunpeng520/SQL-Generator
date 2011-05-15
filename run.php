<?php
ini_set('error_reporting', '1');
error_reporting(E_ALL & ~E_NOTICE);

?><!doctype html>
<html>
	<head>
		<title>sqlGenerator+ run.php</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			require_once 'class.Config.php';
			require_once 'class.Database.php';
			require_once('FirePHPCore/fb.php');
			
			$db = new Database();
			echo '<pre>';
			
			$val = array(
				array('name' => '"daniel"', 'surname' => '"Kowalski"'),
				array('name' => '"marcin"', 'surname' => '"Jeliński"'),
				array('name' => '"Staszek"', 'surname' => '"Adamczyk"')
			);
			
//			$val = array('')
			
			try {

//				$arr = $db->update('nazwiska2')->set('name', '"Daniel"')->like('name', '"da%"')->exec();
//				$arr = $db->select('*')->from('nazwiska2')->in('id', '1,2')->exec();
				$arr = $db->select('*')->from('nazwiska2')->getSql();
				print_r($arr);
				printf('Dodano %d rekordów.', $arr);
				
			} catch(Exception $e) {
				echo '<br />' . str_repeat('-', 30) . '<br />';
				echo $e->getMessage();
				echo '<br />' . str_repeat('-', 30) . '<br />';
				echo $db;
				echo '<br />' . str_repeat('-', 30) . '<br />';
			}
					
			echo '</pre>';
			
		?>
	</body>
</html>
