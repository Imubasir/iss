function load_requests () {
	$.ajax({
		url: 'load_requests.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";

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
				var status = data[i].remark;
				var date_added = moment(data[i].sched_date_added).format("ddd D MMM YYYY");;

				tbl_body+= "<tr><td>"+a+"</td><td>"+student_id+"</td><td>"+name+"</td><td>"+service+"</td><td>"+date_added+"</td><td>"+status+"</td><td>"+assigned_user+"</td></tr>";
			}
			$("#request_body").html(tbl_body);
			$("#request_tbl").dataTable();
		}
	})
}

function addRequest () {
	var formData = new FormData(document.querySelector("#reqForm"));

	$.ajax({
		type: 'POST',
		url: 'addRequest.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({

					title: 'Request Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#requestModal").modal("hide");
				load_requests ();
			} else {
				new PNotify({
					title: 'Request Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})
}

$(document).ready(function() {
	load_requests ();
	keep_open("keep-open,index");
	document.getElementById("student_id").addEventListener('keyup', function() {
		var stud_id = $("#student_id").val();

		$.ajax({
			type: 'POST',
			url: 'check_details.php',
			data: 'id=' + stud_id,

			success: function(json) {
				console.log(json);
				var data = JSON.parse(json);
				if (data == '') {
					$("#student_name").val("No Match Found");
					$("#student_prog").val("No Match Found");
				}

				for (var i = 0; i < data.length; i++) {
					var name = data[i].name;
					var prog = data[i].prog_name;

					$("#student_name").val(name);
					$("#student_prog").val(prog);
				}
			}
		})
	})
})