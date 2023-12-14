function fetch_profile () {
	$.ajax({
		url: 'fetch_profile.php',

		success: function (json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var password = data[i].password;
				var name = data[i].name;
				var username = data[i].username;
				var email = data[i].email;
				var password = data[i].password;
				var image = data[i].image;

				$("#staff_name").html(name);
				$("#ed_staff_name").val(name);
				$("#staff_username").val(username);
				$("#staff_email").val(email);
				$("#staff_password").val(password);
				document.getElementById("profile_image").src = image;
			}
		}
	})
}

function imageChanger() {
	var imageFile = new FormData(document.querySelector("#image_form"));

	$.ajax({
		type: 'POST',
		url: 'changeImage.php',
		data: imageFile,
		cache: false,
		processData: false,
		contentType: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({

					title: 'Profile Image Updated',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})
				fetch_profile();
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

function updateLogin() {
	var password = $("#staff_password").val();
	var confirmPassword = $("#staff_confirmPassword").val();
	var formData = new FormData(document.querySelector("#updateLoginForm"));

	var chk = document.getElementById("checkPassword");
		if(chk.checked == true) {
		formData.append("pswd_check", "true");

		if(password == confirmPassword) {
			$.ajax({
				type: 'POST',
				url: 'updateLogin.php',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,

				success: function(responseText) {
					console.log(responseText);
					if(responseText == '1') {
						new PNotify({

							title: 'Profile Updated',
							text: '',
							type: 'success',
							styling: 'bootstrap3'
						})

						fetch_profile();
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
		} else {
			new PNotify({
				title: 'Passwords Do Not Match',
				text: '',
				type: 'error',
				styling: 'bootstrap3'
			})
		}
	} else {
		formData.append("pswd_check", "false");
		$.ajax({
			type: 'POST',
			url: 'updateLogin.php',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,

			success: function(responseText) {
				console.log(responseText);
				if(responseText == '1') {
					new PNotify({

						title: 'Profile Updated',
						text: '',
						type: 'success',
						styling: 'bootstrap3'
					})

					fetch_profile();
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

}

$(document).ready(function () {
	keep_open("keep-open,index");
	fetch_profile();

	document.getElementById("checkPassword").addEventListener("click", function () {
		var chk = document.getElementById("checkPassword");
		if(chk.checked == true) {
		document.getElementById("paswd_div").style.display = 'block';
		} else {
			document.getElementById("paswd_div").style.display = 'none';
		}
	})
})