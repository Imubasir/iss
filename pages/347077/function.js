function searchStudent () {
	var val = $("#searchText").val();

	$.ajax({
		type: 'POST',
		url: 'searchStudent.php',
		data: 'stud_id='+val,

		success: function(json) {
			var data = JSON.parse(json);
			console.log(data);
			if(data.length == 0) {
				$("#search_status").html("<span style='color: red;'>No Record Found</span>");
				$("#editStudentForm").trigger("reset");
				document.getElementById("resultView").style.display = 'none';
			} else {
				$("#search_status").html("<span style='color: green;'>Record Found</span>");
				document.getElementById("resultView").style.display = 'block';

				var data = JSON.parse(json);
				for (var i = 0; i < data.length; i++) {
					var index_no = data[i].index_no;
					var student_id = data[i].student_id;
					var firstname = data[i].firstname;
					var middlename = data[i].middlename;
					var lastname = data[i].lastname;
					var gender = data[i].gender;
					var dateofbirth = data[i].dateofbirth;
					var placeofbirth = data[i].placeofbirth;
					var nationality = data[i].nationality;
					var hometown = data[i].hometown;
					var homeregion = data[i].homeregion;
					var postal_address = data[i].postal_address;
					var entrylevel = data[i].entrylevel;
					var entryyear = data[i].entryyear;
					var guardianname = data[i].guardianname;
					var guardianaddress = data[i].guardianaddress;
					var guardiancontact = data[i].guardiancontact;
					var admission_category = data[i].admission_category;
					var prog_fk = data[i].prog_fk;
					var study_status = data[i].study_status;

					$("#index_no").val(index_no);
					$("#student_id").val(student_id);
					$("#firstname").val(firstname);
					$("#middlename").val(middlename);
					$("#lastname").val(lastname);
					if(gender == "MALE") {
						$("#male").attr("checked", true);
					} else if (gender == "FEMALE") {
						$("#female").attr("checked", true);
					}
					$("#gender").val(gender);
					$("#dateofbirth").val(dateofbirth);
					$("#placeofbirth").val(placeofbirth);
					$("#nationality").val(nationality);
					$("#hometown").val(hometown);
					$("#homeregion").val(homeregion);
					$("#postaladdress").val(postal_address);
					$("#entrylevel").val(entrylevel);
					$("#entryyear").val(entryyear);
					$("#guardianname").val(guardianname);
					$("#guardianaddress").val(guardianaddress);
					$("#guardiancontact").val(guardiancontact);
					$("#admissioncategory").val(admission_category);
					$("#course_programme").val(prog_fk);
					$("#studystatus").val(study_status);

					$("#saveStudentBtn").off("click").on("click", function() {
						var formData = new FormData(document.querySelector("#editStudentForm"));

						$.ajax({
							type: 'POST',
							url: 'updateStudent.php',
							data: formData,
							cache: false,
							processData: false,
							contentType: false,

							success: function (responseText) {
								if(responseText == '1') {
									new PNotify({
										title: 'Student Updated',
										text: '',
										type: 'success',
										styling: 'bootstrap3'
									})
								} else {
									new PNotify({
										title: 'Update Failed',
										text: 'Please Contact your Administrator',
										type: 'error',
										styling: 'bootstrap3'
									})

									write_page_error(responseText);
								}
							}
						})
					})
				}
			}
		}
	})
}

function fetchSingleStudent () {
	var formData = new FormData(document.querySelector("#searchResultForm"));
	$("#resultModal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'fetchResult.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0; i < data.length; i++) {
				var res_id = data[i].res_id;
				var res_session = data[i].res_session;
				var res_student_id = data[i].res_student_id;
				var res_level = data[i].res_level;
				var res_term = data[i].res_term;
				var res_code = data[i].res_code;
				var res_title = data[i].res_title;
				var res_mark = data[i].res_mark;
				var res_grade = data[i].res_grade;
				var res_credit = data[i].res_credit;

				tbl_body += "<tr><td><span>"+res_code+"</span></td><td>"+res_title+"</td><td><input type='number' class='form-control' value='"+res_mark+"'></td><td><input type='text' class='form-control' value='"+res_grade+"'></td><td><button onclick='delResult(\""+res_id+"\")' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button></td></tr>";
			}
			$("#edit_body").html(tbl_body);

			$("#saveResultsBtn").off("click").on("click", function () {
				var tbl = document.getElementById("edit_body");
				var rowCount = tbl.rows.length;
				for (var i = 0; i < rowCount; i++) {

					var row = tbl.rows[i];
					var code = row.cells[0].getElementsByTagName('span')[0];
					var mark = row.cells[2].getElementsByTagName('input')[0];
					var grade = row.cells[3].getElementsByTagName('input')[0];

					var formData = new FormData();
					formData.append("stud_id", res_student_id);
					formData.append("session", res_session);
					formData.append("level", res_level);
					formData.append("term", res_term);

					formData.append("code", code.innerText);
					formData.append("mark", mark.value);
					formData.append("grade", grade.value);
					formData.append("credits", res_credit);
					formData.append("old_mark", res_mark);
					formData.append("old_grade", res_grade);

					$.ajax({
						type: 'POST',
						url: 'updateResults.php',
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function (responseText) {
							console.log(responseText);
							if(responseText == '1') {
								new PNotify({
									title: 'Results Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})
							} else {
								new PNotify({
									title: 'Update Failed',
									text: 'Please Contact your Administrator',
									type: 'error',
									styling: 'bootstrap3'
								})

								write_page_error(responseText);
							}
						}
					})
				}
			})
		}
	})
}

function delResult(id) {
	$.ajax({
		type: 'POST',
		url: 'delete_result.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Result Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})
			} else {
				new PNotify({
					title: 'Deletion Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}

function deleteGroup () {
	var formData = new FormData(document.querySelector("#delGroupForm"));
	$("#delModal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'fetchGroupResult.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function (json) {
			console.log(json);
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0; i < data.length; i++) {
				var res_id = data[i].res_id;
				var res_session = data[i].res_session;
				var res_student_id = data[i].res_student_id;
				var res_level = data[i].res_level;
				var res_term = data[i].res_term;
				var res_code = data[i].res_code;
				var res_title = data[i].res_title;
				var res_mark = data[i].res_mark;
				var res_grade = data[i].res_grade;
				var res_credit = data[i].res_credit;

				tbl_body += "<tr><td>"+res_session+"</td><td>"+res_code+"</td><td>"+res_title+"</td><td>"+res_mark+"</td><td>"+res_grade+"</td></tr>";
			}
			$("#del_body").html(tbl_body);

			$("#delResultsBtn").off("click").on("click", function() {
				$.ajax({
					type: 'POST',
					url: 'delete_group.php',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,

					success: function(responseText) {
						if(responseText == '1') {
							$("#delModal").modal("hide");
							
							new PNotify({
								title: 'Group Results Deleted',
								text: '',
								type: 'success',
								styling: 'bootstrap3'
							})
						} else {
							new PNotify({
								title: 'Deletion Failed',
								text: 'Please Contact your Administrator',
								type: 'error',
								styling: 'bootstrap3'
							})

							write_page_error(responseText);
						}
					}
				})
			})
		}
	})

}

$(document).ready(function() {
	$("#edit_type").on("change", function() {
		var state = $("#edit_type").val();

		if (state == 'single') {
			document.getElementById("single_div").style.display = 'block';
			document.getElementById("group_div").style.display = 'none';
		} else if (state == 'group'){
			document.getElementById("single_div").style.display = 'none';
			document.getElementById("group_div").style.display = 'block';
		}
	})
})