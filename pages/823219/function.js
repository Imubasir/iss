function uploadStudents () {
		var loading = new PNotify({
		text: 'Please Wait...Uploading Students',
		icon: 'fas fa-spinner fa-pulse',
		type: 'info',
		styling: 'bootstrap3',
		hide: false,
		shadow: false,
		modules: {
			Buttons: {
				closer: false,
				sticker: false
			},
			Animate: {
				animate: true,
				inClass: 'bounceInLeft',
				outClass: 'bounceOutRight'
			}
		}
	});

	var formData = new FormData(document.querySelector("#student_form"));

	$.ajax({
		type: 'POST',
		url: 'studentUpload.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function(responseText) {
			PNotify.removeAll();
			new PNotify({
				title: responseText,
				text: '',
				type: 'success',
				styling: 'bootstrap3'
			})

		}
	})
}

function uploadResults () {
	var loading = new PNotify({
		text: 'Please Wait...Uploading Results',
		icon: 'fas fa-spinner fa-pulse',
		type: 'info',
		styling: 'bootstrap3',
		hide: false,
		shadow: false,
		modules: {
			Buttons: {
				closer: false,
				sticker: false
			},
			Animate: {
				animate: true,
				inClass: 'bounceInLeft',
				outClass: 'bounceOutRight'
			}
		}
	});

	var formData = new FormData(document.querySelector("#result_form"));

	$.ajax({
		type: 'POST',
		url: 'resultUpload.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function(responseText) {
			PNotify.removeAll();
			new PNotify({
				title: responseText,
				text: '',
				type: 'success',
				styling: 'bootstrap3'
			})

		}
	})
}

function uploadGraduands () {
	var loading = new PNotify({
		text: 'Please Wait...Uploading Graduands',
		icon: 'fas fa-spinner fa-pulse',
		type: 'info',
		styling: 'bootstrap3',
		hide: false,
		shadow: false,
		modules: {
			Buttons: {
				closer: false,
				sticker: false
			},
			Animate: {
				animate: true,
				inClass: 'bounceInLeft',
				outClass: 'bounceOutRight'
			}
		}
	});

	var formData = new FormData(document.querySelector("#grad_form"));

	$.ajax({
		type: 'POST',
		url: 'gradUpload.php',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,

		success: function(responseText) {
			PNotify.removeAll();
			new PNotify({
				title: responseText,
				text: '',
				type: 'success',
				styling: 'bootstrap3'
			})

		}
	})
}