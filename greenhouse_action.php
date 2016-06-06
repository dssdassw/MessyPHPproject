<html>
	<head>
		<title>Sensor Information</title>
	</head>
	<body>
		<?php
			$names = array(0 => 'main_tank_temp',   //sensor 1  - T001
						   1 => 'main_tank_rpot',   //sensor 2  - O001
													//sensor 3 omitted
						   2 => 'main_tank_o2',		//sensor 4  - D001 
						   3 => 'main_tank_pHa',	//sensor 5  - P001
													//sensor 6 omitted
						   4 => 'z3_ground',		//sensor 7  - T010
						   5 => 'z3_middle',		//sensor 8  - T007
						   6 => 'z3_ceiling',	    //sensor 9  - T006
						   7 => 'small_tank_temp',  //sensor 10 - T011
						   8 => 'z2_ceiling',	    //sensor 11 - T003
						   9 => 'z2_middle',		//sensor 12 - T008
						   10 => 'z1_ceiling',		//sensor 13 - T012
						   11 => 'z1_ground',		//sensor 14 - T005
													//sensor 15 omitted
						   12 => 'main_tank_pHb',			//sensor 16 - PE01
						   13 => 'main_tank_pHc',			//sensor 17 - PE02
						   14 => 'main_tank_pHd',			//sensor 18 - PE03
						   15 => 'main_tank_bottom', 		//sensor 19 - T020
						   16 => 'main_tank_middle', 		//sensor 20 - T021
						   17 => 'main_tank_top'			//sensor 21 - T022
			);
			$senid = array('T001',
						   'O001',
						   //NULL,
						   'D001',
						   'P001',
						   //NULL,
						   'T010',
						   'T007',
						   'T006',
						   'T011',
						   'T003',
						   'T008',
						   'T012',
						   'T005',
						   //NULL,
						   'PE01',
						   'PE02',
						   'PE03',
						   'T020',
						   'T021',
						   'T022'
			);
			print "Checkbox read results: ";
			print ($names[3]);
			for ($i = 0; $i < 18; $i++) {
				$temp = $_POST[($names[$i]);
				print "</br>" . $i . ". " . ($temp) . ": " . isset($val);
				if ($temp == 'on') {
					print " DETECTED!";
				}
				else {
					print " Not active.";
				}
			}
		?>
	</body>
</html>
