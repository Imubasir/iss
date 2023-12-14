function load_schedules () {
	$.ajax({
		url: 'loadSchedules.php',

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var sch_id = data[i].sch_id;
				var index_num = data[i].indexnum;
				var sched_date_added = moment(data[i].sched_date_added).format("ddd D MMM YYYY");
				var remark = data[i].remark;
				var trans_id = data[i].trans_id;
				var assigned_user = data[i].assigned_user;

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='reassign_user(\"" + sch_id +"\")'>Reassign</a></li><li><a class='dropdown-item' href='#' onclick='delete_request(\"" + trans_id +"\")'>Delete</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+index_num+"</td><td>"+sched_date_added+"</td><td>"+remark+"</td><td>"+assigned_user+"</td><td>"+action+"</td></tr>";
			}
			$("#scheduler_body").html(tbl_body);
			$("#scheduler_tbl").dataTable();
		}
	})
}

function reassign_user (id) {
	$("#reassign_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectAssigned.php',
		data: 'id='+id,

		success: function(response) {
			console.log(response);
			$("#assigned_user").html(response);

			$("#assignBtn").off("click").on("click", function() {
				var user = $("#reassign").val();

				$.ajax({
					type: 'POST',
					url: 'assign_user.php',
					data: 'id='+id+'&user='+user,

					success: function(responseText) {
						if(responseText == '1') {
							new PNotify({

								title: 'Request Reassigned',
								text: '',
								type: 'success',
								styling: 'bootstrap3'
							})

							load_schedules ();
						} else {
							new PNotify({
								title: 'Assign Failed',
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

function delete_request (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_request.php',
		data: 'id='+id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({

					title: 'Request Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_schedules ();
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
	load_schedules ();
	listUsers();
	keep_open("keep-open,index");
})