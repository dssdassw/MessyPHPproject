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
}
