function subjects() {
	var coursetype = $( "#coursetype" ).val();
	var yearlevel = $( "#yearlevel" ).val();
	var courseterm = $( "#courseterm" ).val();
	var studenttype = $( "#studenttype" ).val();
	if(coursetype == 1 && yearlevel == 1 && courseterm == 1 && studenttype == "Regular")
	$("#subjects").val( "GE111 GE112 GE113 NSTP1 PE1 ITE111 ITP111" );
	else if (coursetype == 1 && yearlevel == 1 && courseterm == 2 && studenttype ==="Regular")
	$("#subjects").val( "GE124 NSTP2 PE2 ITE122 ITP122 ITP123" );
	else if (coursetype == 1 && yearlevel == 1 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "GE135 PE3 ILB131 ITE131 ITE133 ITP134 ITP135 IT131" );
	else if (coursetype == 1 && yearlevel == 2 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "GE211 GE212 PE4 ITP211 ITE211 ITE212" );
	else if (coursetype == 1 && yearlevel == 2 && courseterm == 2 && studenttype === "Regular")
	$("#subjects").val( "GE223 GE223 GE225 ITP222 ITP222 ITP224 ITE223" );
	else if (coursetype == 1 && yearlevel == 2 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "GE236 ILB231 ITP235 ITP236 ITELE1" );
	else if (coursetype == 1 && yearlevel == 3 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "ITE313 ITP311 ITP323 ITELE2" );
	else if (coursetype == 1 && yearlevel == 3 && courseterm == 2 && studenttype === "Regular")
	$("#subjects").val( "GE321 ITP312 CAP3A ITELE3" );
	else if (coursetype == 1 && yearlevel == 3 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "CAP3B OJT331A ITELE4" );
	else if (coursetype == 1 && yearlevel == 4 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "OJT331B" );
	else if (coursetype == 2 && yearlevel == 1 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "GE111 GE112 GE113 BA111 NSTP1 PE1 BA112" );
	else if (coursetype == 2 && yearlevel == 1 && courseterm == 2 && studenttype === "Regular")
	$("#subjects").val( "GE124 BA121 BA122 BA123 NSTP2 PE2" );
	else if (coursetype == 2 && yearlevel == 1 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "GE135 BA131 BA132 BA133 BA134 PE3 ILB131" );
	else if (coursetype == 2 && yearlevel == 2 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "GE211 BA211 ILB132 FIL211 PE4 BA212" );
	else if (coursetype == 2 && yearlevel == 2 && courseterm == 2 && studenttype === "Regular")
	$("#subjects").val( "BAELEC1 BA221 GE224 GE225 BA222" );
	else if (coursetype == 2 && yearlevel == 2 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "BA231 BAELEC2 FIL232 BA232 BA233" );
	else if (coursetype == 2 && yearlevel == 3 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "BA311 BA312 BAST1 BAST2 BA313" );
	else if (coursetype == 2 && yearlevel == 3 && courseterm == 2 && studenttype === "Regular")
	$("#subjects").val( "BA321 BA322 GE321 BAELEC3 BAELEC4" );
	else if (coursetype == 2 && yearlevel == 3 && courseterm == 3 && studenttype === "Regular")
	$("#subjects").val( "BA331 OJT331A GE223" );
	else if (coursetype == 2 && yearlevel == 4 && courseterm == 1 && studenttype === "Regular")
	$("#subjects").val( "OJT331B" );
	else if	(studenttype === "Irregular")
	$("#subjects").val();
}

$( "select" ).change( subjects );
subjects();