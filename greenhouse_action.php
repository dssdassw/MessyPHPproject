<html>
	<head>
		<title>Sensor Information</title>
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
		<link rel=stylesheet type='text/css' href=stylesheet.css>
		<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
		<script type='text/javascript' src='tablesort.min.js'></script>
		<script type='text/javascript' src='tablesort.number.js'></script>
		<script type='text/javascript' src='tablesort.date.js'></script>
		<script type='text/javascript' src='sort.js'></script>
		<script type='text/javascript'>
			var sorttypes = document.getElementsByName('sorttype');
			var selected = 0;
			/*for (var s = 0; s < sorttypes.length; s++) { 
				if (sorttypes[s].checked) {
					selected = sorttypes[s].value;
				}
			}*/
			if (selected == 0) {
				var datesorted = false;
				var datasorted = false;
			}/*else if (selected == 1) {
				var datesorted = true;
				var datasorted = false;
			} else if (selected == 2) {
				var datesorted = false;
				var datasorted = true;
			}*/ //this code would have been used for the MySQL sort to make sure ascending & descending functioned as expected, but in the end I didn't actually have time to finish that, so I removed it
			//also for some reason the sorting doesn't work unless you have it in script and in an external .js file
			function sort_date(i) { //uses code by github user tristen!
				var tableid = "table" + i;
				return new Tablesort(document.getElementById(tableid), {descending: datesorted});
				datesorted = !datesorted;
			}
			function sort_data(i) { //uses code by github user tristen!
				var tableid = "table" + i;
				return new Tablesort(document.getElementById(tableid), {descending: datasorted});
				datasorted = !datasorted;
			} //needs tablesort.min.js
		</script>
		<script type='text/javascript'>
			google.charts.load('current', {'packages':['corechart']});
		</script>
	</head>
	<body>
		<?php
			$names = array(0 => $_POST['main_tank_temp'],		//sensor 1  - T001
						   1 => $_POST['main_tank_rpot'],		//sensor 2  - O001
																//sensor 3 omitted
						   2 => $_POST['main_tank_o2'],			//sensor 4  - D001 
						   3 => $_POST['main_tank_pHa'],		//sensor 5  - P001
						   										//sensor 6 omitted
						   4 => $_POST['z3_ground'],			//sensor 7  - T010
						   5 => $_POST['z3_middle'],			//sensor 8  - T007
						   6 => $_POST['z3_ceiling'],	 		//sensor 9  - T006
						   7 => $_POST['small_tank_temp'],		//sensor 10 - T011
						   8 => $_POST['z2_ceiling'],			//sensor 11 - T003
						   9 => $_POST['z2_middle'],			//sensor 12 - T008
						   10 => $_POST['z1_ceiling'],			//sensor 13 - T012
						   11 => $_POST['z1_ground'],			//sensor 14 - T005
																//sensor 15 omitted
						   12 => $_POST['main_tank_pHb'],		//sensor 16 - PE01
						   13 => $_POST['main_tank_pHc'],		//sensor 17 - PE02
						   14 => $_POST['main_tank_pHd'],		//sensor 18 - PE03
						   15 => $_POST['main_tank_bottom'], 	//sensor 19 - T020
						   16 => $_POST['main_tank_middle'], 	//sensor 20 - T021
						   17 => $_POST['main_tank_top']		//sensor 21 - T022
			);
			$senid = array(0 => 'T001',
						   1 => 'O001',
						   //NULL,
						   2 => 'D001',
						   3 => 'P001',
						   //NULL,
						   4 => 'T010',
						   5 => 'T007',
						   6 => 'T006',
						   7 => 'T011',
						   8 => 'T003',
						   9 => 'T008',
						   10 => 'T012',
						   11 => 'T005',
						   //NULL,
						   12 => 'PE01',
						   13 => 'PE02',
						   14 => 'PE03',
						   15 => 'T020',
						   16 => 'T021',
						   17 => 'T022'
			);
			$senno = array(0 => 1,
						   1 => 2,
						   //3 is skipped
						   2 => 4,
						   3 => 5,
						   //7 is skipped
						   4 => 7,
						   5 => 8,
						   6 => 9,
						   7 => 10,
						   8 => 11,
						   9 => 12,
						   10 => 13,
						   11 => 14,
						   //15 is skipped
						   12 => 16,
						   13 => 17,
						   14 => 18,
						   15 => 19,
						   16 => 20,
						   17 => 21
			);
			$hrnames = array(0 => 'Main Tank Temperature',
							 1 => 'Main Tank Oxidation Reduction Potential',
							 2 => 'Main Tank O<sub>2</sub>',
							 3 => 'Main Tank pH #1',
							 4 => 'Zone 3 Ground Temperature',
							 5 => 'Zone 3 Middle Temperature',
							 6 => 'Zone 3 Ceiling Temperature',
							 7 => 'Small Tank Temperature',
							 8 => 'Zone 2 Ceiling Temperature',
							 9 => 'Zone 2 Middle Temperature',
							 10 => 'Zone 1 Ceiling Temperature',
							 11 => 'Zone 1 Ground Temperature',
							 12 => 'Main Tank pH #2',
							 13 => 'Main Tank pH #3',
							 14 => 'Main Tank pH #4',
							 15 => 'Main Tank Bottom Temperature',
							 16 => 'Main Tank Middle Temperature',
							 17 => 'Main Tank Top Temperature'
			);
			error_reporting(E_ALL);
			ini_set('display_errors', 1); //change to 0 on production server!
			$date_from = date("'Y-m-d H:i:s'", strtotime($_POST['fromdate']));
			$date_to = date("'Y-m-d H:i:s'", strtotime($_POST['todate']));
			print $date_from . ' to ' . $date_to;
			print "</br>NOTE: With large tables, the sorting may seem to not work, but just be patient.";
			$graph_results = $_POST['showgraph'];
			$db_name = 'ics';
			$db_user = 'ics';
			$db_pass = 'password';
			$db_host = 'localhost';
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
			$db = new mysqli($db_host, $db_user, $db_pass, $db_name);
			if ($db->connect_errno > 0) {
				die('Unable to connect to database [' . $db->connect_error . ']');
			}
			if ($graph_results) {
					$data_array = array();
			}
			for ($i = 0; $i < 18; $i++) {
				if (!empty($names[$i])) { //eliminates spam of "undefined index" for unchecked checkboxes
					$box = $names[$i];
					if ($box == 'on') {
						$sql =
<<<SQL
	SELECT DATE(SampleDateTime) AS SampleDateTime,SensorData
	FROM Aquaponics_Data
	WHERE Sensor_No=$i AND SampleDateTime BETWEEN CAST($date_from AS DATETIME) AND CAST($date_to AS DATETIME);
SQL;
						if (!$result = $db->query($sql)) {
							die('There was an error running the query [' . $db->error . ']');
						}
						
						print '<hr>' . $hrnames[$i] . "<TABLE id=table$i class=bordered><tr class=no-sort><th class=bordered><button onclick='sort_date($i);' class=prettybutton>Date</button></th><th class=bordered><button onclick='sort_data($i);' class=prettybutton>Data</button></th></tr>";
						while($row = $result->fetch_assoc()){
							print '<tr class=bordered><td class=bordered>' . $row['SampleDateTime'] . '</td><td class=bordered>' . $row['SensorData'] . '</td></tr>';
							if ($graph_results == 'on') {
								array_push($data_array, $row);
							}
						}
						if ($graph_results == 'on') {
								$json_arr = json_encode($data_array);
						}
						print '</TABLE>';
						if ($graph_results) {
							print "
							<script>
								google.charts.setOnLoadCallback(drawGraph$i);
								function drawGraph$i() {
									var jarray  = {$json_arr};
									var jarr = [];
									var swapper = false;
									var date_arr  = [];
									var value_arr = [];
									for (i = 0; i < jarray.length; i++) {
										for (var item in jarray[i]) {
											if (swapper) {
												value_arr.push(parseFloat(jarray[i][item]));
											}
											else {
												date_arr.push(jarray[i][item]);
											}
											swapper = !swapper;
										}
									}						
									var data  = new google.visualization.DataTable();
									data.addColumn('string', 'Date');
									data.addColumn('number', 'Value');
									for (l = 0; l < date_arr.length; l++) { //both date_arr and value_arr should have the same value
										data.addRow([date_arr[l], value_arr[l]]);
									}
									console.log('--------------');
									var options = {
										title: '$hrnames[$i]'
									};
									var graph = new google.visualization.LineChart(document.getElementById('graphdiv$i'));
									graph.draw(data, options);
								}
							</script>
							<div id=graphdiv$i></div>"; 
							$data_array = array();
						}
					}
				}
			}
		?>
	</body>
</html>
