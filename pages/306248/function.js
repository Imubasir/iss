function userRegistration() {
	var formData = new FormData(document.querySelector("#addUser_form"));

	$.ajax({
		type: 'POST',
		url: 'addUser.php',
		data: formData,
		cache: false,
		contentType: false,
		processData: false,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({

					title: 'User Added',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				$("#addUser_modal").modal("hide");
				load_users ();
			} else {
				new PNotify({
					title: 'Registration Failed',
					text: 'Please Contact your Administrator',
					type: 'error',
					styling: 'bootstrap3'
				})

				write_page_error(responseText);
			}
		}
	})

}

function load_users () {
	$.ajax({
		url: "load_users.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var name = data[i].name;
				var department = data[i].dept_name;
				var username = data[i].username;
				var last_login = moment(data[i].last_login).format("ddd D MMM YYYY - hh:mm:ss");
				var role = data[i].role;
				var date_added = moment(data[i].login_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_user(\"" + username +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_user(\"" + username +"\")'>Delete</a></li><li><a class='dropdown-item' href='#' onclick='user_access(\"" + username +"\")'>Edit Access</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+name+"</td><td>"+department+"</td><td>"+username+"</td><td>"+date_added+"</td><td>"+last_login+"</td><td>"+action+"</td></tr>";
			}
			$("#users_body").html(tbl_body);
			$("#users_tbl").dataTable();
		}

	})
}

function edit_user (id) {
	$("#editUser_modal").modal("show");

	$.ajax({
		type: 'POST',
		url: 'selectUser.php',
		data: 'id='+id,

		success: function(json) {
			var data = JSON.parse(json);
			for (var i = 0; i < data.length; i++) {
				var name = data[i].name;
				var username = data[i].username;
				var department = data[i].department;
				var role = data[i].role;
				var transcript = data[i].transcript;

				$("#edit_staff_name").val(name);
				$("#edit_username").val(username);
				$("#edit_prog_department").val(department);
				$("#edit_role").val(role);
				$("#edit_transcript").val(transcript);

				$("#editBtn").off("click").on("click", function() {
					var formData = new FormData(document.querySelector("#editUser_form"));
					$.ajax({
						type: 'POST',
						url: 'editUser.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,

						success: function(responseText) {
							if(responseText == '1') {
								new PNotify({
									title: 'User Updated',
									text: '',
									type: 'success',
									styling: 'bootstrap3'
								})

								$("#editUser_modal").modal("hide");
								load_users ();
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

function delete_user (id) {
	$.ajax({
		type: 'POST',
		url: 'delete_user.php',
		data: 'username=' +id,

		success: function(responseText) {
			if(responseText == '1') {
				new PNotify({
					title: 'User Deleted',
					text: '',
					type: 'success',
					styling: 'bootstrap3'
				})

				load_users ();
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

function user_access(username) {
	$("#editAccess_modal").modal('show');

	$("#checkAll").click(function() {
		if ($(this).prop("checked") == true) {
			var tbl = document.getElementById("accessbody");
			var rowCount = tbl.rows.length;
			$('input[type="checkbox"]').attr('checked', true);

		} else if ($(this).prop("checked") == false) {
			$('input[type="checkbox"]').attr('checked', false);
		}
	})

	$.ajax({
		type: 'POST',
		url: 'accessChecker.php',

		success: function(response) {
                console.log(response);
                var data = JSON.parse(response);

                var html = '';
                for (var i = 0; i < data.length; i++) {
                	var id = data[i].page_id;
                	var page = data[i].page_name;
                	var category = data[i].page_category;

                	html += "<tr><td class='check-mail'><input type = 'checkbox' class = 'i-checks' value = '" + id + "' id ='" + id + "'></td><td>" + page + "</td><td>" + category + "</td></tr>";

                	check(username + "," + id);
                }

                $("#accessbody").html(html);

                $("#saveAccess").unbind('click').on('click', function() {
                	var tbl = document.getElementById("accessbody");
                	var rowCount = tbl.rows.length;
                	for (var i = 0; i < rowCount; i++) {

                		var row = tbl.rows[i];
                		var chkbox = row.cells[0].getElementsByTagName('input')[0];
                		if (null != chkbox && true == chkbox.checked) {
                			var name = chkbox.value;

                			addAccess(name + ',' + username);

                		} else if (null != chkbox && false == chkbox.checked) {
                			var name = chkbox.value;

                			delAccess(name + ',' + username);
                		}
                	}
                	new PNotify({
                		title: 'Success',
                		text: 'User Access Level Updated',
                		type: 'success',
                		styling: 'bootstrap3'
                	})
                	$("#access").modal('hide');
                })
            }
        })
    }

    function check(parameters) {
    	var data = parameters.split(",");

    	for (var i = 0; i < data.length; i++) {
    		var username = data[0];
    		var pageid = data[1];

    	}
    	$.ajax({
    		type: 'POST',
    		url: 'checkStatus.php',
    		data: 'id=' + pageid + '&user=' + username,

    		success: function(e) {
    			// console.log(e);
    			if (e == pageid) {
    				document.getElementById(pageid).checked = true;
    			}
    		}
    	})
    }

    function addAccess(input) {
    	var data = input.split(",");
    	for (var i = 0; i < data.length; i++) {
    		var pageid = data[0];
    		var username = data[1];
    	}
    	$.ajax({
    		type: 'POST',
    		url: 'addAccess.php',
    		data: 'id=' + pageid + '&user=' + username,

    		success: function(e) {
            // console.log(e);
        }
    })

    }

    function delAccess(input) {
    	var data = input.split(",");
    	for (var i = 0; i < data.length; i++) {
    		var input = data[0];
    		var name = data[1];
    	}

    	$.ajax({
    		type: 'POST',
    		url: 'delAccess.php',
    		data: 'id=' + input + '&user=' + name,

    		success: function(e) {
    			if (e == 1) {
    				new PNotify({
    					title: 'User Removed',
    					text: name + ' Access Revoked',
    					type: 'info',
    					styling: 'bootstrap3'
    				})
    			}
    		}
    	})
    }

    $(document).ready(function() {
    	load_users();
    })