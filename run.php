<!doctype html>
<html>
	<head>
		<title>sqlGenerator+ run.php</title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			require_once 'class.Config.php';
			require_once 'class.Database.php';
			
			$db = new Database();
			echo '<pre>';
			
			$val = array(
				array('name' => 'daniel', 'surname' => 'Kowalski'),
				array('name' => 'marcin', 'surname' => 'Jeliński'),
				array('name' => 'Staszek', 'surname' => 'Adamczyk')
			);
			
//			$val = array('')
			
			try {

				$arr = $db->select('*')->from('my')->where('id')->in(array(2, 4))->exec();
//				$arr = $db->insert($val)->into('my')->getSql();
				print_r($arr);
				$arr = $db->select('*')->from('my')->where('id')->in(array(2, 6))->exec();
				print_r($arr);
//				printf('Dodano %d rekordów.', $arr);
				
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
