<html>
	<head>
		<title>Sensor Information</title>
	</head>
	<body>
		<?php
			$names = array('main_tank_temp',   //sensor 1  - T001
						   'main_tank_rpot',   //sensor 2  - O001
						   //sensor 3 omitted
						   'main_tank_o2',     //sensor 4  - D001 
						   'main_tank_pHa',    //sensor 5  - P001
						   //sensor 6 omitted
						   'z3_ground',        //sensor 7  - T010
						   'z3_middle',        //sensor 8  - T007
						   'z3_ceiling',       //sensor 9  - T006
						   'small_tank_temp',  //sensor 10 - T011
						   'z2_ceiling',       //sensor 11 - T003
						   'z2_middle',        //sensor 12 - T008
						   'z1_ceiling',       //sensor 13 - T012
						   'z1_ground',        //sensor 14 - T005
						   //sensor 15 omitted
						   'main_tank_pHb',    //sensor 16 - PE01
						   'main_tank_pHc',    //sensor 17 - PE02
						   'main_tank_pHd',    //sensor 18 - PE03
						   'main_tank_bottom', //sensor 19 - T020
						   'main_tank_middle', //sensor 20 - T021
						   'main_tank_top'     //sensor 21 - T022
			);
			$senid = array('T001',
						   'O001',
						   NULL,
						   'D001',
						   'P001',
						   NULL,
						   'T010',
						   'T007',
						   'T006',
						   'T011',
						   'T003',
						   'T008',
						   'T012',
						   'T005',
						   NULL,
						   'PE01',
						   'PE02',
						   'PE03',
						   'T020',
						   'T021',
						   'T022'
			);
			foreach ($checkboxes as $val){
				print isset($val);
			}
		?>
	</body>
</html>
