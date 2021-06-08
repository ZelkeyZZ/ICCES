$(document).ready(function() {
	$("#calculate").click(function() {
		var prelim = $("#prelim").val();
		var midterm = $("#midterm").val();
		var finals = $("#final").val();
		var avegrade = ((parseFloat(prelim) + parseFloat(midterm) + parseFloat(finals)) / 3);
		var average = 0;
		average = avegrade;
		var overall = $("#overall").val();
		if (average == 97 || average > 97) {
		$("#overall").val(1.00);
		} else if (average == 94 || average > 94) {
		$("#overall").val(1.25);
		} else if (average == 91 || average > 91) {
		$("#overall").val(1.50);
		} else if (average == 88 || average > 88) {
		$("#overall").val(1.75);
		} else if (average == 85 || average > 85) {
		$("#overall").val(2.00);
		} else if (average == 83 || average > 83) {
		$("#overall").val(2.25);
		} else if (average == 80 || average > 80) {
		$("#overall").val(2.50);
		} else if (average == 77 || average > 77) {
		$("#overall").val(2.75);
		} else if (average == 75 || average > 75) {
		$("#overall").val(3.00);
		} else if (average < 74) {
		$("#overall").val(5.00);
		}
		$("#average").val(average.toFixed(2));
	});
});
