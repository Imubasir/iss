/* -------------- PROGRAMMES ------------- */
function addProgramme () {
	var formData = new FormData(document.querySelector("#addProgramme_form"));

	$.ajax({
		type: 'POST',
		url: 'addProgramme.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Programme Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#addProgramme_modal").modal("hide");
				load_programmes ();
			} else if (responseText == '2') {
				new PNotify({
					title: 'Duplication Entry',
					text: '',
					type: 'error',
					styling: 'bootstrap3'
				})
			} else {
				new PNotify({
					title: 'Programme Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}

function edit_prog (id) {
	$("#editProgramme_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectProg.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var prog_id = data[i].prog_id;
				var prog_name = data[i].prog_name;
				var dept_fk = data[i].dept_fk;
				var duration = data[i].duration;

				$("#edit_prog_title").val(prog_name);
				$("#edit_prog_duration").val(duration);
				$("#edit_prog_department").val(dept_fk);

				$("#editProgBtn").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#editProgramme_form"));
					formData.append("id", prog_id);

					$.ajax({
						type: 'POST',
						url: 'editProgramme.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'Programme Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#editProgramme_modal").modal("hide");
								load_programmes ();
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
	})
}

function delete_prog (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_prog.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Programme Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_programmes ();
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

/* -------------- DEPARTMENTS ------------- */


function addDeparment () {
	var formData = new FormData(document.querySelector("#addDepartment_form"));

	$.ajax({
		type: 'POST',
		url: 'addDepartment.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Department Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#addDepartment_modal").modal("hide");
				load_departments ();
			} else if (responseText == '2') {
				new PNotify({
					title: 'Duplication Entry',
					text: '',
					type: 'error',
					styling: 'bootstrap3'
				})
			} else {
				new PNotify({
					title: 'Department Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}


function edit_dept (id) {
	$("#editDepartment_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectDept.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var dept_id = data[i].dept_id;
				var dept_name = data[i].dept_name;
				var hod = data[i].hod;
				var faculty_fk = data[i].faculty_fk;

				$("#edit_dept_name").val(dept_name);
				$("#edit_dept_faculty").val(faculty_fk);
				$("#edit_dept_hod").val(hod);

				$("#editDeptBtn").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#editDepartment_form"));
					formData.append("id", dept_id);

					$.ajax({
						type: 'POST',
						url: 'editDept.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'Department Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#editDepartment_modal").modal("hide");
								load_departments ();
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
	})
}

function delete_dept (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_dept.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Department Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_departments ();
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


/* -------------- Faculties ------------- */


function addFaculty () {
	var formData = new FormData(document.querySelector("#addFaculty_form"));

	$.ajax({
		type: 'POST',
		url: 'addFaculty.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Faculty Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#addFaculty_modal").modal("hide");
				load_faculty ();
			} else if (responseText == '2') {
				new PNotify({
					title: 'Duplication Entry',
					text: '',
					type: 'error',
					styling: 'bootstrap3'
				})
			} else {
				new PNotify({
					title: 'Faculty Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}

function edit_fac (id) {
	$("#editFaculty_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectFaculty.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var faculty_id = data[i].faculty_id;
				var faculty_name = data[i].faculty_name;
				var faculty_dean = data[i].faculty_dean;

				$("#edit_faculty_name").val(faculty_name);
				$("#edit_faculty_dean").val(faculty_dean);

				$("#editFacBtn").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#editFaculty_form"));
					formData.append("id", faculty_id);

					$.ajax({
						type: 'POST',
						url: 'editFaculty.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'Faculty Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#editFaculty_modal").modal("hide");
								load_faculty ();
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
	})
}

function delete_faculty (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_faculty.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Faculty Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_faculty ();
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

$(document).ready(function () {

})