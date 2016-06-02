<html>
	<head>
		<title>Sensor Information</title>
	</head>
	<body>
		<?php
			/*$checkboxes = array($_POST['main_tank_o2'],    //sensor 4  - D001.
								$_POST['main_tank_temp'],  //sensor 1  - T001.
								$_POST['main_tank_top'],   //sensor 21 - T022.
								$_POST['main_tank_middle'],//sensor 20 - T021.
								$_POST['main_tank_bottom'],//sensor 19 - T020.
								$_POST['z1_ceiling'],      //sensor 13 - T012.
								$_POST['z1_ground'],       //sensor 14 - T005.
								$_POST['z2_ceiling'],      //sensor 11 - T003.
								$_POST['z2_middle'],       //sensor 12 - T008.
								$_POST['z3_ceiling'],      //sensor 9  - T006.
								$_POST['z3_middle'],       //sensor 8  - T007.
								$_POST['z3_ground'],       //sensor 7  - T010.
								$_POST['small_tank_temp'], //sensor 10 - T011.
								$_POST['main_tank_pHa'],   //sensor 5  - P001.
								$_POST['main_tank_pHb'],   //sensor 16 - PE01.
								$_POST['main_tank_pHc'],   //sensor 17 - PE02.
								$_POST['main_tank_pHd'],   //sensor 18 - PE03.
								$_POST['main_tank_rpot']   //sensor 2  - O001.
			);*/
			$checkboxes = array($_POST['main_tank_temp'],  //sensor 1  - T001.
								$_POST['main_tank_rpot']   //sensor 2  - O001.
								//3 is marked as '.' in this table, = omitted
								$_POST['main_tank_o2'],    //sensor 4  - D001.
								$_POST['main_tank_pHa'],   //sensor 5  - P001.
								//6 is omitted from the actual table
								$_POST['z3_ground'],       //sensor 7  - T010.
								$_POST['z3_middle'],       //sensor 8  - T007.
								$_POST['z3_ceiling'],      //sensor 9  - T006.
								$_POST['small_tank_temp'], //sensor 10 - T011.
								$_POST['z2_ceiling'],      //sensor 11 - T003.
								$_POST['z2_middle'],       //sensor 12 - T008.
								$_POST['z1_ceiling'],      //sensor 13 - T012.
								$_POST['z1_ground'],       //sensor 14 - T005.
								//15 is omitted from the actual table
								$_POST['main_tank_pHb'],   //sensor 16 - PE01.
								$_POST['main_tank_pHc'],   //sensor 17 - PE02.
								$_POST['main_tank_pHd'],   //sensor 18 - PE03.
								$_POST['main_tank_bottom'],//sensor 19 - T020.
								$_POST['main_tank_middle'],//sensor 20 - T021.
								$_POST['main_tank_top'],   //sensor 21 - T022.
			);
			foreach ($checkboxes as $index => $val){
				print $val;
			}
		?>
	</body>
</html>
