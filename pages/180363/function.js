function generate () {
	var formData = new FormData(document.querySelector("#search_form"));
	var sel_cat = $("#sel_cat").val();

	$.ajax({
		type: 'POST',
		url: 'generate.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function (json) {
			var data = JSON.parse(json);
			var tbl_body = '';

			if(sel_cat == '1') { //Format for Enrollment
				$("#result_modal").modal("show");

				for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
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

					tbl_body += "<tr><td>"+a+"</td><td>"+student_id+"</td><td>"+index_no+"</td><td>"+firstname+"</td><td>"+middlename+"</td><td>"+lastname+"</td><td>"+gender+"</td><td>"+dateofbirth+"</td><td>"+placeofbirth+"</td><td>"+nationality+"</td><td>"+hometown+"</td><td>"+homeregion+"</td><td>"+postal_address+"</td><td>"+entrylevel+"</td><td>"+entryyear+"</td><td>"+guardianname+"</td><td>"+guardianaddress+"</td><td>"+guardiancontact+"</td><td>"+admission_category+"</td><td>"+prog_name+"</td><td>"+study_status+"</td></tr>";
				}
				$("#result_body").html(tbl_body);
				$('#result_tbl').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel',
						messageTop: 'Enrollment Data',
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
					]
				} );
			} else if (sel_cat == '2') {  //Format for Results
				// var from = $("#datefrom").val();
				// var to = $("#dateto").val();
				var from = moment($("#datefrom").val()).format("ddd D MMM YYYY");
				var to = moment($("#dateto").val()).format("ddd D MMM YYYY");

				$("#request_modal").modal("show");
				for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
					var trans_id = data[i].trans_id;
					var student_id = data[i].student_id;
					var name = data[i].stud_name;
					if(data[i].copies == '1') {
						var service = data[i].service_name + " - "+ data[i].copies + " copy";
					} else if (data[i].copies > 1) {
						var service = data[i].service_name + " - "+ data[i].copies + " copies";
					}
					var assigned_user = data[i].name;
					var prog_name = data[i].prog_name;
					var status = data[i].remark;
					var verify_code = data[i].verify_code;
					var date_added = moment(data[i].sched_date_added).format("ddd D MMM YYYY");

					tbl_body+= "<tr><td>"+a+"</td><td>"+trans_id+"</td><td>"+student_id+"</td><td>"+name+"</td><td>"+prog_name+"</td><td>"+service+"</td><td>"+date_added+"</td><td>"+status+"</td><td>"+assigned_user+"</td><td>"+verify_code+"</td></tr>";
				}

				$("#request_body").html(tbl_body);
				$('#request_tbl').DataTable( {
					dom: 'Bfrtip',
					buttons: [ {
						extend: 'excel',
						messageTop: 'Request Data For '+from+ ' ::: '+to,
						exportOptions: {
							columns: ':visible'
						}
					},
					'colvis'
					]
				} );
			}

		}
	})
}

$(document).ready(function () {
	document.getElementById("sel_cat").addEventListener('change', function () {
		var cat_val = $("#sel_cat").val();
		if(cat_val == '1') {
			document.getElementById("enroll_option").style.display = 'block';
			document.getElementById("request_option").style.display = 'none';
		} else if (cat_val == '2') {
			document.getElementById("enroll_option").style.display = 'none';
			document.getElementById("request_option").style.display = 'block';
		}
	})
})