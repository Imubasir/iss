function addCourse () {
	var formData = new FormData(document.querySelector("#addCourse_form"));

	$.ajax({
		type: 'POST',
		url: 'addCourse.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Course Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#addCourse_modal").modal("hide");
				load_courses ();
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

function edit_course (id) {
	$("#editCourse_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectCourse.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var course_id = data[i].course_id;
				var course_code = data[i].course_code;
				var course_title = data[i].course_title;
				var course_credit = data[i].course_credit;
				var course_level = data[i].course_level;
				var prog_name = data[i].prog_name;
				var prog_fk = data[i].course_prog_fk;

				$("#edit_course_code").val(course_code);
				$("#edit_course_title").val(course_title);
				$("#edit_course_credit").val(course_credit);
				$("#edit_course_level").val(course_level);
				$("#edit_course_programme").val(prog_fk);

				$("#editCourseBtn").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#editCourse_form"));
					formData.append("id", course_id);

					$.ajax({
						type: 'POST',
						url: 'editCourse.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'Course Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#editCourse_modal").modal("hide");
								load_courses ();
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

function delete_course (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_course.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Course Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_courses ();
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