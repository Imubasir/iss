function load_enrollment () {
	$.ajax({
		url: "load_enrollment.php",

		success: function(json) {
			console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var student_id = data[i].student_id;
				var index_no = data[i].index_no;
				var name = data[i].name;
				var prog_name = data[i].prog_name;
				var entryyear = data[i].entryyear+" - "+data[i].study_status;

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='viewProfile(\"" + student_id +"\")'>View Profile</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+student_id+"</td><td>"+index_no+"</td><td>"+name+"</td><td>"+prog_name+"</td><td>"+entryyear+"</td><td>"+action+"</td></tr>";
			}
			$("#enrol_body").html(tbl_body);
			$("#enrol_tbl").dataTable();
		}

	})
}

function viewProfile (studentid) {
	$("#profile_modal").modal("show");
	$.ajax({
		type: 'POST',
		url: 'selectStudent.php',
		data: 'id='+studentid,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var index_no = data[i].index_no;
				var student_id = data[i].student_id;
				var firstname = data[i].firstname;
				var middlename = data[i].middlename;
				var lastname = data[i].lastname;
				var gender = data[i].gender;
				var dateofbirth = moment(data[i].dateofbirth).format("DD MMM YYYY");
				var placeofbirth = data[i].placeofbirth;
				var nationality = data[i].countryname;
				var hometown = data[i].hometown;
				var homeregion = data[i].regionname;
				var postal_address = data[i].postal_address;
				var entrylevel = data[i].entrylevel;
				var entryyear = data[i].entryyear;
				var guardianname = data[i].guardianname;
				var guardianaddress = data[i].guardianaddress;
				var guardiancontact = data[i].guardiancontact;
				var admission_category = data[i].admission_category;
				var prog_name = data[i].prog_name;
				var study_status = data[i].study_status;

				$("#index_no").html(index_no);
				$("#student_id").html(student_id);
				$("#student_name").html(firstname+" "+middlename+" "+lastname);
				$("#gender").html(gender);
				$("#dateofbirth").html(dateofbirth);
				$("#placeofbirth").html(placeofbirth);
				$("#nationality").html(nationality);
				$("#hometown").html(hometown);
				$("#homeregion").html(homeregion);
				$("#postaladdress").html(postal_address);
				$("#entrylevel").html(entrylevel);
				$("#entryyear").html(entryyear);
				$("#guardianname").html(guardianname);
				$("#guardianaddress").html(guardianaddress);
				$("#guardiancontact").html(guardiancontact);
				$("#admissioncategory").html(admission_category);
				$("#std_programme").html(prog_name);
				$("#studystatus").html(study_status);
			}

		}
	})
}

function Search () {
	var formdata = new FormData(document.querySelector("#search_form"));
	$.ajax({
		type: 'POST',
		url: 'search.php',
		data: formdata,
		cache: false,
		processData: false,
		contentType: false,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a < data.length+1; i++, a++) {
				var student_id = data[i].student_id;
				var index_no = data[i].index_no;
				var name = data[i].firstname+" "+data[i].middlename+" "+data[i].lastname;
				var prog_name = data[i].prog_name;
				var entryyear = data[i].entryyear+" - "+data[i].study_status;

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='viewProfile(\"" + student_id +"\")'>View Profile</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+student_id+"</td><td>"+index_no+"</td><td>"+name+"</td><td>"+prog_name+"</td><td>"+entryyear+"</td><td>"+action+"</td></tr>";
			}
			$("#search_form").trigger('reset');
			$("#search_modal").modal('hide');
			$("#enrol_body").html(tbl_body);
			$("#enrol_tbl").dataTable();
		}
	})
}

$(document).ready(function() {
	load_enrollment ();
	keep_open("keep-open,index");
})