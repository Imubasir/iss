
function load_notification () {
	$.ajax({
		url: "load_notification.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var not_id = data[i].not_id;
				var title = data[i].not_title;
				var user = data[i].not_added_by;
				var date_added = moment(data[i].not_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_notify(\"" + not_id +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_notify(\"" + not_id +"\")'>Delete</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+title+"</td><td>"+date_added+"</td><td>"+user+"</td><td>"+action+"</td></tr>";
			}
			$("#notify_body").html(tbl_body);
			$("#notify_tbl").dataTable();
		}

	})
}

function addNotification () {
	var formData = new FormData(document.querySelector("#notification_form"));

	$.ajax({
		type: 'POST',
		url: 'addNotification.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({

					title: 'Notification Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#notification_modal").modal("hide");				
				load_notification ();
				notification();
			} else {
				new PNotify({
					title: 'Notification Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}

function delete_notify (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_notify.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Notification Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_notification ();
				notification();
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

function edit_notify (id) {
	$("#edit_notification_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectNotify.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var not_id = data[i].not_id;
				var title = data[i].not_title;
				var message = data[i].not_message;

				$("#edit_notification_title").val(title);
				$("#edit_notification").val(message);

				$("#updateNotify").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#edit_notification_form"));
					formData.append("id", not_id);

					$.ajax({
						type: 'POST',
						url: 'editNotify.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'Notification Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#edit_notification_modal").modal("hide");
								load_notification ();
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

$(document).ready(function () {
	load_notification ();
})