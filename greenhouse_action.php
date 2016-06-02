<html>
	<head>
		<title>Sensor Information</title>
	</head>
	<body>
		<?php
			$checkboxes = array($_POST['main_tank_pH'],    //sensor 5
								//$_POST['small_tank_pH'], ???
								$_POST['main_tank_o2'],    //sensor 4
								//$_POST['small_tank_o2'], ???
								$_POST['z1_ceiling'],
								$_POST['z1_middle'],
								$_POST['z1_ground'],
								$_POST['z2_ceiling'],
								$_POST['z2_middle'],
								$_POST['z2_ground'],
								$_POST['z3_ceiling'],
								$_POST['z3_middle'],
								$_POST['z3_ground'],
								$_POST['z1_humidity'],
								$_POST['z2_humidity'],
								$_POST['z3_humidity']
			);
			foreach ($checkboxes as $index => $val){
				print $val;
			}
		?>
	</body>
</html>
