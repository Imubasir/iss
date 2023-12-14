function searchStudent () {
	var val = $("#search_id").val();

	$.ajax({
		type: 'POST',
		url: 'searchStudent.php',
		data: 'id='+val,

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";

			for (var i = 0; i < data.length; i++) {
				var studentid = data[i].student_id;
				var name = data[i].name;
				var prog = data[i].prog_name;
                var level = data[i].current_level;

				var action = "<button class='btn btn-sm btn-primary' type='button' onclick='previewResults(\""+studentid+"\")'>Preview</button>";

				tbl_body += "<tr><td>"+studentid+"</td><td>"+name+"</td><td>"+prog+"</td><td>"+level+"</td><td>"+action+"</td></tr>";
			}

			$("#search_body").html(tbl_body);
		}
	})
}

function previewResults(id) {
	$("#statement_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'fetchGrades.php',
		data: 'id=' + id,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var programme = data['biodata'][0].prog_name;
			var studentid = data['biodata'][0].student_id;
			var name = data['biodata'][0].firstname+" "+data['biodata'][0].middlename+" "+data['biodata'][0].lastname;
			var gender = data['biodata'][0].gender;
			var dateofbirth = moment(data['biodata'][0].dateofbirth).format("DD MMM YYYY");
			var programme = data['biodata'][0].prog_name;

			$("#view_studentid").html(": "+studentid);
			$("#view_name").html(": "+name);
			$("#view_gender").html(": "+gender);
			$("#view_dob").html(": "+dateofbirth);
			$("#view_programme").html(": "+programme);
			
			var html1 = "";
			var header = "<table style='width:100%;border-bottom: 2px solid black;' class='table inner_tbl'><thead class='inner_thead'><tr><th>Course Code</th><th style='width:60%;'>Course Title</th><th>Credits</th><th>Mark</th><th>Grade</th></tr></thead><tbody>";

						//FIRST YEAR
						var session1 = "<tr><td colspan='5'><div style='text-align:center;width:100%;font-size: 20px;font-weight: bold;color: #111f4e;'><h5 class='one'>FIRST YEAR</h5></div><td></tr>";

						html1 += "<tr><td colspan='5'><label style='font-weight:bold;color:black;'>FIRST TERM RESULTS</label><td></tr>";
						html1 += header;

						var html2 = '';
						html2 += "<tr><td colspan='5'><label style='font-weight:bold;color:black;'>SECOND TERM RESULTS</label><td></tr>";
						html2 += header;

						var html3 = '';
						html3 += "<div style='text-align:center;width:100%'></div><label style='font-weight:bold;color:black;'>THIRD TERM RESULTS</label>";
						html3 += header;

                        //SECOND YEAR
                        var session2 = "<div class='headStyle' style='text-align:center;width:100%;font-size: 20px;font-weight: bold;color: #111f4e;'><h5 class='two'>SECOND YEAR</h5></div>";

                        var html4 = '';
                        html4 += "<br><label style='font-weight:bold;color:black;'>FIRST TERM RESULTS</label>";
                        html4 += header;

                        var html5 = '';
                        html5 += "<div style='text-align:center;width:100%'></div><br><label style='font-weight:bold;color:black;'>SECOND TERM RESULTS</label>";
                        html5 += header;

                        var html6 = '';
                        html6 += "<div style='text-align:center;width:100%'></div><br><label style='font-weight:bold;color:black;'>THIRD TERM RESULTS</label>";
                        html6 += header;

                        //THIRD YEAR
                        var session3 = "<div id='thirdyear' class='headStyle' style='text-align:center;width:100%;font-size: 20px;font-weight: bold;color: #111f4e;'><h5 class='three'>THIRD YEAR</h5></div>";

                        var html7 = '';
                        html7 += "<br><label style='font-weight:bold;color:black;'>FIRST TERM RESULTS</label>";
                        html7 += header;

                        var html8 = '';
                        html8 += "<div style='text-align:center;width:100%'></div><br><label style='font-weight:bold;color:black;'>SECOND TERM</label>";
                        html8 += header;

                        var html9 = '';
                        html9 += "<div style='text-align:center;width:100%'></div><br><label style='font-weight:bold;color:black;'>THIRD TERM RESULTS</label>";
                        html9 += header;

                        //FOURTH YEAR
                        var session4 = "<div class='headStyle' style='text-align:center;width:100%;font-size: 20px;font-weight: bold;color: #111f4e;'><h5 class='four'>FOURTH YEAR</h5></div>";

                        var html10 = '';
                        html10 += "<br><label style='font-weight:bold;color:black;'>FIRST TRIMESTER RESULTS</label>";
                        html10 += header;

                        var html11 = '';
                        html11 += "<div style='text-align:center;width:100%'></div><label style='font-weight:bold;color:black;'>SECOND TRIMESTER RESULTS</label>";
                        html11 += header;

                        var html12 = '';
                        html12 += "<div style='text-align:center;width:100%'></div><label style='font-weight:bold;color:black;'>THIRD TRIMESTER RESULTS</label>";
                        html12 += header;

                        var cc1 = 0;
                        var cc2 = 0;
                        var cc3 = 0;
                        var cc4 = 0;
                        var cc5 = 0;
                        var cc6 = 0;
                        var cc7 = 0;
                        var cc8 = 0;
                        var cc9 = 0;
                        var cc10 = 0;
                        var cc11 = 0;
                        var cc12 = 0;

                        var gp1 = 0;
                        var gp2 = 0;
                        var gp3 = 0;
                        var gp4 = 0;
                        var gp5 = 0;
                        var gp6 = 0;
                        var gp7 = 0;
                        var gp8 = 0;
                        var gp9 = 0;
                        var gp10 = 0;
                        var gp11 = 0;
                        var gp12 = 0;

                        var cgpa1 = 0;
                        var cgpa2 = 0;
                        var cgpa3 = 0;
                        var cgpa4 = 0;
                        var cgpa5 = 0;
                        var cgpa6 = 0;
                        var cgpa7 = 0;
                        var cgpa8 = 0;
                        var cgpa9 = 0;
                        var cgpa10 = 0;
                        var cgpa11 = 0;
                        var cgpa12 = 0;

                        // FIRST YEAR FIRST TRIMESTER

                        for (var i = 0; i < data['first_first'].length; i++) {
                        	var trimester = data['first_first'][i].res_term;
                        	var level = data['first_first'][i].res_level;

                        	var title = data['first_first'][i].res_title;
                        	var code = data['first_first'][i].res_code;
                        	var credits = data['first_first'][i].res_credit;
                        	var grade = data['first_first'][i].res_grade;
                        	var mark = data['first_first'][i].res_mark;
                        	var res_gp1 = data['first_first'][i].res_gp;
                        	cc1 += new Number(credits);
                        	gp1 += new Number(res_gp1);

                        	if (tempcode == data['first_first'][i].res_code && tempgrade == data['first_first'][i].res_grade) {
                        		tempcode = data['first_first'][i].res_code;
                        		tempgrade = data['first_first'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['first_first'][i].res_code && tempgrade != data['first_first'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['first_first'][i].res_code;
                        		tempgrade = data['first_first'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['first_first'][i].res_code;
                        	var tempgrade = data['first_first'][i].res_grade;

                        	var one_one = true;
                        	html1 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>"+mark+"</td><td>" + grade + "</td></tr>";
                        }
                        var gpa1 = gp1/cc1;
                        cgpa1 = gpa1;

                        // FIRST YEAR SECOND TRIMESTER
                        for (var i = 0; i < data['first_second'].length; i++) {
                        	var trimester = data['first_second'][i].res_term;
                        	var level = data['first_second'][i].res_level;

                        	var title = data['first_second'][i].res_title;
                        	var code = data['first_second'][i].res_code;
                        	var credits = data['first_second'][i].res_credit;
                        	var grade = data['first_second'][i].res_grade;
                        	var mark = data['first_second'][i].res_mark;
                        	var res_gp2 = data['first_second'][i].res_gp;
                        	cc2 += new Number(credits);
                        	gp2 += new Number(res_gp2);

                        	if (tempcode == data['first_second'][i].res_code && tempgrade == data['first_second'][i].res_grade) {
                        		tempcode = data['first_second'][i].res_code;
                        		tempgrade = data['first_second'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['first_second'][i].res_code && tempgrade != data['first_second'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['first_second'][i].res_code;
                        		tempgrade = data['first_second'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['first_second'][i].res_code;
                        	var tempgrade = data['first_second'][i].res_grade;

                        	var one_two = true;
                        	html2 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>"+mark+"</td><td>" + grade + "</td></tr>";
                        }
                        var gpa2 = gp2/cc2;
                        cgpa2 = (gp2 + gp1) / (cc2 + cc1);

                        // FIRST YEAR THIRD TRIMESTER
                        for (var i = 0; i < data['first_third'].length; i++) {
                        	var trimester = data['first_third'][i].res_term;
                        	var level = data['first_third'][i].res_level;

                        	var title = data['first_third'][i].res_title;
                        	var code = data['first_third'][i].res_code;
                        	var credits = data['first_third'][i].res_credit;
                        	var grade = data['first_third'][i].res_grade;
                        	var mark = data['first_third'][i].res_mark;
                        	var res_gp3 = data['first_third'][i].res_gp;
                        	cc3 += new Number(credits);
                        	gp3 += new Number(res_gp3);

                        	if (tempcode == data['first_third'][i].res_code && tempgrade == data['first_third'][i].res_grade) {
                        		tempcode = data['first_third'][i].res_code;
                        		tempgrade = data['first_third'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['first_third'][i].res_code && tempgrade != data['first_third'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['first_third'][i].res_code;
                        		tempgrade = data['first_third'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['first_third'][i].res_code;
                        	var tempgrade = data['first_third'][i].res_grade;

                        	var one_three = true;
                        	html3 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa3 = gp3/cc3;
                        cgpa3 = (gp3 + gp2 + gp1) / (cc3 + cc2 + cc1);

                        // SECOND YEAR FIRST TRIMESTER
                        for (var i = 0; i < data['second_first'].length; i++) {
                        	var trimester = data['second_first'][i].res_term;
                        	var level = data['second_first'][i].res_level;

                        	var title = data['second_first'][i].res_title;
                        	var code = data['second_first'][i].res_code;
                        	var credits = data['second_first'][i].res_credit;
                        	var grade = data['second_first'][i].res_grade;
                        	var mark = data['second_first'][i].res_mark;
                        	var res_gp4 = data['second_first'][i].res_gp;
                        	cc4 += new Number(credits);
                        	gp4 += new Number(res_gp4);

                        	if (tempcode == data['second_first'][i].res_code && tempgrade == data['second_first'][i].res_grade) {
                        		tempcode = data['second_first'][i].res_code;
                        		tempgrade = data['second_first'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['second_first'][i].res_code && tempgrade != data['second_first'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['second_first'][i].res_code;
                        		tempgrade = data['second_first'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['second_first'][i].res_code;
                        	var tempgrade = data['second_first'][i].res_grade;

                        	var two_one = true;
                        	html4 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa4 = gp4/cc4;
                        cgpa4 = (gp4 + gp3 + gp2 + gp1) / (cc4 + cc3 + cc2 + cc1);

                        // SECOND YEAR SECOND TRIMESTER
                        for (var i = 0; i < data['second_second'].length; i++) {
                        	var trimester = data['second_second'][i].res_term;
                        	var level = data['second_second'][i].res_level;

                        	var title = data['second_second'][i].res_title;
                        	var code = data['second_second'][i].res_code;
                        	var credits = data['second_second'][i].res_credit;
                        	var grade = data['second_second'][i].res_grade;
                        	var mark = data['second_second'][i].res_mark;
                        	var res_gp5 = data['second_second'][i].res_gp;
                        	cc5 += new Number(credits);
                        	gp5 += new Number(res_gp5);

                        	if (tempcode == data['second_second'][i].res_code && tempgrade == data['second_second'][i].res_grade) {
                        		tempcode = data['second_second'][i].res_code;
                        		tempgrade = data['second_second'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['second_second'][i].res_code && tempgrade != data['second_second'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['second_second'][i].res_code;
                        		tempgrade = data['second_second'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['second_second'][i].res_code;
                        	var tempgrade = data['second_second'][i].res_grade;

                        	var two_two = true;
                        	html5 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa5 = gp5/cc5;
                        cgpa5 = (gp5 + gp4 + gp3 + gp2 + gp1) / (cc5 + cc4 + cc3 + cc2 + cc1);

                        // SECOND YEAR THIRD TRIMESTER
                        for (var i = 0; i < data['second_third'].length; i++) {
                        	var trimester = data['second_third'][i].res_term;
                        	var level = data['second_third'][i].res_level;

                        	var title = data['second_third'][i].res_title;
                        	var code = data['second_third'][i].res_code;
                        	var credits = data['second_third'][i].res_credit;
                        	var grade = data['second_third'][i].res_grade;
                        	var mark = data['second_third'][i].res_mark;
                        	var res_gp6 = data['second_third'][i].res_gp;
                        	cc6 += new Number(credits);
                        	gp6 += new Number(res_gp6);

                        	if (tempcode == data['second_third'][i].res_code && tempgrade == data['second_third'][i].res_grade) {
                        		tempcode = data['second_third'][i].res_code;
                        		tempgrade = data['second_third'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['second_third'][i].res_code && tempgrade != data['second_third'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['second_third'][i].res_code;
                        		tempgrade = data['second_third'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['second_third'][i].res_code;
                        	var tempgrade = data['second_third'][i].res_grade;

                        	var two_three = true;
                        	html6 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa6 = gp6/cc6;

                        // THIRD YEAR FIRST TRIMESTER
                        for (var i = 0; i < data['third_first'].length; i++) {
                        	var trimester = data['third_first'][i].res_term;
                        	var level = data['third_first'][i].res_level;

                        	var title = data['third_first'][i].res_title;
                        	var code = data['third_first'][i].res_code;
                        	var credits = data['third_first'][i].res_credit;
                        	var grade = data['third_first'][i].res_grade;
                        	var mark = data['third_first'][i].res_mark;
                        	var res_gp7 = data['third_first'][i].res_gp;
                        	cc7 += new Number(credits);
                        	gp7 += new Number(res_gp7);

                        	if (tempcode == data['third_first'][i].res_code && tempgrade == data['third_first'][i].res_grade) {
                        		tempcode = data['third_first'][i].res_code;
                        		tempgrade = data['third_first'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['third_first'][i].res_code && tempgrade != data['third_first'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['third_first'][i].res_code;
                        		tempgrade = data['third_first'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['third_first'][i].res_code;
                        	var tempgrade = data['third_first'][i].res_grade;

                        	var three_one = true;
                        	html7 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa7 = gp7/cc7;

                        // THIRD YEAR SECOND TRIMESTER
                        for (var i = 0; i < data['third_second'].length; i++) {
                        	var trimester = data['third_second'][i].res_term;
                        	var level = data['third_second'][i].res_level;

                        	var title = data['third_second'][i].res_title;
                        	var code = data['third_second'][i].res_code;
                        	var credits = data['third_second'][i].res_credit;
                        	var grade = data['third_second'][i].res_grade;
                        	var mark = data['third_second'][i].res_mark;
                        	var res_gp8 = data['third_second'][i].res_gp;
                        	cc8 += new Number(credits);
                        	gp8 += new Number(res_gp8);

                        	if (tempcode == data['third_second'][i].res_code && tempgrade == data['third_second'][i].res_grade) {
                        		tempcode = data['third_second'][i].res_code;
                        		tempgrade = data['third_second'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['third_second'][i].res_code && tempgrade != data['third_second'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['third_second'][i].res_code;
                        		tempgrade = data['third_second'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['third_second'][i].res_code;
                        	var tempgrade = data['third_second'][i].res_grade;

                        	var three_two = true;
                        	html8 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa8 = gp8/cc8;

                        // THIRD YEAR THIRD TRIMESTER
                        for (var i = 0; i < data['third_third'].length; i++) {
                        	var trimester = data['third_third'][i].res_term;
                        	var level = data['third_third'][i].res_level;

                        	var title = data['third_third'][i].res_title;
                        	var code = data['third_third'][i].res_code;
                        	var credits = data['third_third'][i].res_credit;
                        	var grade = data['third_third'][i].res_grade;
                        	var mark = data['third_third'][i].res_mark;
                        	var res_gp9 = data['third_third'][i].res_gp;
                        	cc9 += new Number(credits);
                        	gp9 += new Number(res_gp9);

                        	if (tempcode == data['third_third'][i].res_code && tempgrade == data['third_third'][i].res_grade) {
                        		tempcode = data['third_third'][i].res_code;
                        		tempgrade = data['third_third'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['third_third'][i].res_code && tempgrade != data['third_third'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['third_third'][i].res_code;
                        		tempgrade = data['third_third'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['third_third'][i].res_code;
                        	var tempgrade = data['third_third'][i].res_grade;

                        	var three_three = true;
                        	html9 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa9 = gp9/cc9;

                        // FOURTH YEAR FIRST TRIMESTER
                        for (var i = 0; i < data['fourth_first'].length; i++) {
                        	var trimester = data['fourth_first'][i].res_term;
                        	var level = data['fourth_first'][i].res_level;

                        	var title = data['fourth_first'][i].res_title;
                        	var code = data['fourth_first'][i].res_code;
                        	var credits = data['fourth_first'][i].res_credit;
                        	var grade = data['fourth_first'][i].res_grade;
                        	var mark = data['fourth_first'][i].res_mark;
                        	var res_gp10 = data['fourth_first'][i].res_gp;
                        	cc10 += new Number(credits);
                        	gp10 += new Number(res_gp10);

                        	if (tempcode == data['fourth_first'][i].res_code && tempgrade == data['fourth_first'][i].res_grade) {
                        		tempcode = data['fourth_first'][i].res_code;
                        		tempgrade = data['fourth_first'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['fourth_first'][i].res_code && tempgrade != data['fourth_first'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['fourth_first'][i].res_code;
                        		tempgrade = data['fourth_first'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['fourth_first'][i].res_code;
                        	var tempgrade = data['fourth_first'][i].res_grade;

                        	var four_one = true;
                        	html10 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa10 = gp10/cc10;

                        // FOURTH YEAR SECOND TRIMESTER
                        for (var i = 0; i < data['fourth_second'].length; i++) {
                        	var trimester = data['fourth_second'][i].res_term;
                        	var level = data['fourth_second'][i].res_level;

                        	var title = data['fourth_second'][i].res_title;
                        	var code = data['fourth_second'][i].res_code;
                        	var credits = data['fourth_second'][i].res_credit;
                        	var grade = data['fourth_second'][i].res_grade;
                        	var mark = data['fourth_second'][i].res_mark;
                        	var res_gp11 = data['fourth_second'][i].res_gp;
                        	cc11 += new Number(credits);
                        	gp11 += new Number(res_gp11);

                        	if (tempcode == data['fourth_second'][i].res_code && tempgrade == data['fourth_second'][i].res_grade) {
                        		tempcode = data['fourth_second'][i].res_code;
                        		tempgrade = data['fourth_second'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['fourth_second'][i].res_code && tempgrade != data['fourth_second'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['fourth_second'][i].res_code;
                        		tempgrade = data['fourth_second'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['fourth_second'][i].res_code;
                        	var tempgrade = data['fourth_second'][i].res_grade;

                        	var four_two = true;
                        	html11 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa11 = gp11/cc11;

                        // FOURTH YEAR THIRD TRIMESTER
                        for (var i = 0; i < data['fourth_third'].length; i++) {
                        	var trimester = data['fourth_third'][i].res_term;
                        	var level = data['fourth_third'][i].res_level;

                        	var title = data['fourth_third'][i].res_title;
                        	var code = data['fourth_third'][i].res_code;
                        	var credits = data['fourth_third'][i].res_credit;
                        	var grade = data['fourth_third'][i].res_grade;
                        	var mark = data['fourth_third'][i].res_mark;
                        	var res_gp12 = data['fourth_third'][i].res_gp;
                        	cc12 += new Number(credits);
                        	gp12 += new Number(res_gp12);

                        	if (tempcode == data['fourth_third'][i].res_code && tempgrade == data['fourth_third'][i].res_grade) {
                        		tempcode = data['fourth_third'][i].res_code;
                        		tempgrade = data['fourth_third'][i].res_grade;
                        		continue;
                        	} else if (tempcode == data['fourth_third'][i].res_code && tempgrade != data['fourth_third'][i].res_grade) {
                        		grade += "**";
                        		tempcode = data['fourth_third'][i].res_code;
                        		tempgrade = data['fourth_third'][i].res_grade;
                        	} else {
                        		if (grade == "F") {
                        			grade += "*";
                        		}
                        	}
                        	var tempcode = data['fourth_third'][i].res_code;
                        	var tempgrade = data['fourth_third'][i].res_grade;

                        	var four_three = true;
                        	html12 += "<tr><td>" + code + "</td><td>" + title + "</td><td>" + credits + "</td><td>" + mark + "</td><td>" + grade + "</td></tr>";
                        }
                        var gpa12 = gp12/cc12;


                        //Add Summary of GPA, CC and CGPA.
                        // FIRST YEAR SUMMARY
                        var summary1 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc1'>"+cc1+"</span><td>GPA: <span id='gpa1'>"+gpa1.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa1'>"+cgpa1.toFixed(2)+"</span></td></tr>";
                        
                        var summary2 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc2'>"+cc2+"</span><td>GPA: <span id='gpa2'>"+gpa2.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa2'>"+cgpa2.toFixed(2)+"</span></td></tr>";
                        
                        var summary3 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc3'>"+cc3+"</span><td>GPA: <span id='gpa3'>"+gpa3.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa3'></span></td></tr>";

                        // SECOND YEAR SUMMARY
                        var summary4 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc4'>"+cc4+"</span><td>GPA: <span id='gpa4'>"+gpa4.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa4'></span></td></tr>";

                        var summary5 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc5'>"+cc5+"</span><td>GPA: <span id='gpa5'>"+gpa5.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa5'></span></td></tr>";

                        var summary6 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc6'>"+cc6+"</span><td>GPA: <span id='gpa6'>"+gpa6.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa6'></span></td></tr>";

                        // THIRD YEAR SUMMARY
                        var summary7 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc7'>"+cc7+"</span><td>GPA: <span id='gpa7'>"+gpa7.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa7'></span></td></tr>";

                        var summary8 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc8'>"+cc8+"</span><td>GPA: <span id='gpa8'>"+gpa8.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa8'></span></td></tr>";

                        var summary9 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc9'>"+cc9+"</span><td>GPA: <span id='gpa9'>"+gpa9.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa9'></span></td></tr>";
                        
                        //FOURTH YEAR Summary
                        var summary10 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc10'>"+cc10+"</span><td>GPA: <span id='gpa10'>"+gpa10.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa10'></span></td></tr>";

                        var summary11 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc11'>"+cc11+"</span><td>GPA: <span id='gpa11'>"+gpa11.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa11'></span></td></tr>";

                        var summary12 = "<tr style='text-align: left;font-weight: bold;color:black;'><td></td><td></td><td>CC: <span id='cc12'>"+cc12+"</span><td>GPA: <span id='gpa12'>"+gpa12.toFixed(2)+"</span></td><td>CGPA: <span id='cgpa12'></span></td></tr>";

                        html1 += summary1 + "</tbody></table><br>";
                        html2 += summary2 + "</tbody></table><br>";
                        html3 += summary3 + "</tbody></table><br>";

                        html4 += summary4 + "</tbody></table><br>";
                        html5 += summary5 + "</tbody></table><br>";
                        html6 += summary6 + "</tbody></table><br>";

                        html7 += summary7 + "</tbody></table><br>";
                        html8 += summary8 + "</tbody></table><br>";
                        html9 += summary9 + "</tbody></table><br>";

                        html10 += summary10 + "</tbody></table><br>";
                        html11 += summary11 + "</tbody></table><br>";
                        html12 += summary12 + "</tbody></table><br>";

                        var end = "</div>";

                        var main = '';

                        $.ajax({
                        	type: 'POST',
                        	url: 'toDisplay.php',
                        	data: 'id=' + id,

                        	success: function(json) {
                        		console.log(json);
                        		if (json.includes(1)) {
                        			main += session1;
                        			if (one_one == true) {
                        				main += html1;
                        			} else {

                        			}
                        			if (one_two == true) {
                        				main += html2;
                        			} else {

                        			}
                        			if (one_three == true) {
                        				main += html3;
                        			} else {

                        			}
                        		}
                        		if (json.includes(2)) {
                        			main += session2;
                        			if (two_one == true) {
                        				main += html4;
                        			} else {

                        			}
                        			if (two_two == true) {
                        				main += html5;
                        			} else {

                        			}
                        			if (two_three == true) {
                        				main += html6;
                        			} else {

                        			}
                        		}
                        		if (json.includes(3)) {
                        			main += session3;
                        			if (three_one == true) {
                        				main += html7;
                        			} else {

                        			}
                        			if (three_two == true) {
                        				main += html8;
                        			} else {

                        			}
                        			if (three_three == true) {
                        				main += html9;
                        			} else {

                        			}
                        		}
                        		if (json.includes(4)) {
                                    main += session4;
                                    if (four_one == true) {
                                        main += html10;
                                    } else {

                                    }
                                    if (four_two == true) {
                                        main += html11;
                                    } else {

                                    }
                                    if (four_three == true) {
                                        main += html12;
                                    } else {

                                    }
                                }

                        		main += end;
                                // averages(id);
                                // total_credits(id);
                                // signatory();
                                document.getElementById("results_body").innerHTML = main;
                            }
                        });

                    } 


                })
}

$(document).ready(function () {
    keep_open("keep-open,index");
})