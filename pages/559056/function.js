
function load_signatory () {
	$.ajax({
		url: 'load_signatory.php',

		success: function (json) {
			var data = JSON.parse(json);
			var tbl_body = "";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var sig_id = data[i].sig_id;
				var name = data[i].sig_name;
				var designation = data[i].sig_designation;
				var status = data[i].sig_status;
				// var lastActive = data[i].last_active;
				var lastActive = moment(data[i].last_active).format("ddd D MMM YYYY - hh:mm:ss");

				if(status == '1') {
					var action = "<button class='btn btn-sm btn-danger' onclick='activation(\""+sig_id+"*0\")'>Deactivate</button>";
				} else if (status == '0') {
					var action = "<button class='btn btn-sm btn-success' onclick='activation(\""+sig_id+"*1\")'>Activate</button>";
				}
				var del = "<buton class='btn btn-sm btn-danger' onclick = 'removeSignatory(\""+sig_id+"\")'>Remove</button>";

				tbl_body += "<tr><td>"+a+"</td><td>"+name+"</td><td>"+designation+"</td><td>"+lastActive+"</td><td>"+action+"</td><td>"+del+"</td></tr>";
			}
			$("#sig_body").html(tbl_body);
			$("#sig_tbl").dataTable();
		}
	})
}

function activation (val) {
	$.ajax({
		type: 'POST',
		url: 'activate.php',
		data: 'val='+val,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Signatory Updated',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_signatory ();
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

function add_signatory () {
	$("#signatory_modal").modal("show");
	var formData = new FormData(document.querySelector("#signatory_form"));

		$.ajax({
		type: 'POST',
		url: 'addSignatory.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Signatory Addd',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_signatory ();
			} else {
				new PNotify({
					title: 'Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}

	})
}

function removeSignatory (id) {
	$.ajax({
		type: 'POST',
		url: 'deleteSignatory.php',
		data: 'id=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'Signatory Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_signatory ();
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
	load_signatory();
	keep_open("keep-open,index");
})