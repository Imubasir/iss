function keep_open(ids) {
    var id = ids.split(",");
    for (var i = 0; i < id.length; i++) {
        var id1 = id[0];
        var id2 = id[1];
    }

    jQuery('.' + id2).click();

    jQuery('.' + id1).on({
        "shown.bs.dropdown": function() { jQuery(this).attr('closable', false); },
        //"click":             function() { }, // For some reason a click() is sent when Bootstrap tries and fails hide.bs.dropdown
        "hide.bs.dropdown": function() { return jQuery(this).attr('closable') == 'true'; }
    });

    jQuery('.' + id1).children().first().on({
        "click": function() {
            jQuery(this).parent().attr('closable', true);
        }
    })
}

function login_process() {
	var fd = new FormData(document.querySelector("#login_form"));
	$.ajax({
		type: 'POST',
		url: 'php/login.php',
		data: fd,
		processData: false,
		contentType: false,

		success: function(response) {
			console.log(response);
			if(response == '52189') {
				window.location = 'pages/';
				localStorage.setItem("status", "true");
			} else if (response == '74190') {
				new PNotify ({
					title: 'Login Failed',
					text: 'Username or Password Incorrect',
					type: 'info',
					styling: 'bootstrap3'
				})
			} else if (response == '19594') {
				new PNotify ({
					title: 'System Error',
					text: 'Please contact your administrator',
					type: 'error',
					styling: 'bootstrap3'
				})
				write_error(response);
			}
		}
	})
}

function passwordReset () {
	var fd = new FormData(document.querySelector("#reset_Form"));
	var password = $("#password").val();
	var con_password = $("#con_password").val();

	if(password == con_password) {
		$.ajax({
			type: 'POST',
			url: 'php/reset.php',
			data: fd,
			processData: false,
			contentType: false,

			success: function (responseText) {
				if(responseText == '1') {
					new PNotify ({
						title: 'Password Changed',
						text: '',
						type: 'info',
						styling: 'bootstrap3'
					})
				} else {
					new PNotify ({
						title: 'Update Failed',
						text: '',
						type: 'error',
						styling: 'bootstrap3'
					})
					write_error(responseText);
				}
			}

		})
	} else {
		new PNotify ({
			title: 'Update Failed',
			text: 'Passwords do not match',
			type: 'error',
			styling: 'bootstrap3'
		})
	}
	
}

function write_error(err) {
	$.ajax ({
		type: 'POST',
		url: 'php/write_error.php',
		data: {
			'error': err
		},

		sucess: function() {

		}
	})
}

function write_page_error(err) {
	$.ajax ({
		type: 'POST',
		url: '../../php/write_error.php',
		data: {
			'error': err
		},

		sucess: function() {

		}
	})
}

function notification () {
	$.ajax ({
		url: '../../php/notification.php',

		success: function(json) {
			var data = JSON.parse(json);
			var count = data.length;
			var content = "";

			for (var i = 0; i < data.length; i++) {
				var title = data[i].not_title;
				var date_added = moment(data[i].not_date_added).fromNow();

				content += "<a class='dropdown-item preview-item' href = '../939425/'><div class='preview-thumbnail'><div class='preview-icon bg-success'><i class='mdi mdi-information mx-0'></i></div></div><div class='preview-item-content'><h6 class='preview-subject font-weight-normal'>"+title+"</h6><p class='font-weight-light small-text mb-0 text-muted'>"+date_added+"</p></div></a>";
			}

			$("#notificationDropdown").html("<i class='mdi mdi-email-open mx-0'></i><span class='count bg-danger'>"+count+"</span>");
			$("#system_notification").html(content);
		}
	})
}



function home_notification () {
	$.ajax ({
		url: '../php/notification.php',

		success: function(json) {
			var data = JSON.parse(json);
			var count = data.length;
			var content = "";

			for (var i = 0; i < data.length; i++) {
				var title = data[i].not_title;
				var date_added = moment(data[i].not_date_added).fromNow();

				content += "<a class='dropdown-item preview-item' href = '../939425/'><div class='preview-thumbnail'><div class='preview-icon bg-success'><i class='mdi mdi-information mx-0'></i></div></div><div class='preview-item-content'><h6 class='preview-subject font-weight-normal'>"+title+"</h6><p class='font-weight-light small-text mb-0 text-muted'>"+date_added+"</p></div></a>";
			}

			$("#notificationDropdown").html("<i class='mdi mdi-email-open mx-0'></i><span class='count bg-danger'>"+count+"</span>");
			$("#system_notification").html(content);
		}
	})
}

function home_notification () {
	$.ajax ({
		url: '../php/notification.php',

		success: function(json) {
			var data = JSON.parse(json);
			var count = data.length;
			var content = "";

			for (var i = 0; i < data.length; i++) {
				var title = data[i].not_title;
				var date_added = moment(data[i].not_date_added).fromNow();

				content += "<a class='dropdown-item preview-item' href = '939425/'><div class='preview-thumbnail'><div class='preview-icon bg-success'><i class='mdi mdi-information mx-0'></i></div></div><div class='preview-item-content'><h6 class='preview-subject font-weight-normal'>"+title+"</h6><p class='font-weight-light small-text mb-0 text-muted'>"+date_added+"</p></div></a>";
			}

			$("#notificationDropdown").html("<i class='mdi mdi-email-open mx-0'></i><span class='count bg-danger'>"+count+"</span>");
			$("#system_notification").html(content);
		}
	})
}

function home_access () {
	$.ajax({
		url:'../php/access.php',
		// url:'../../php/access.php',

		success:function(response) {
			var pages = [];
			var data = JSON.parse(response);

			for(var i = 0; i<data.length; i++) {
				pages.push(data[i].fpage);
			}

            //Access for Home Menu
            if(!(pages.includes("1"))) {
            	document.getElementById("dashboard").style.display = 'none';
            } 
            if(!(pages.includes("2"))) {
            	document.getElementById("profile").style.display = 'none';
            }
            if(!(pages.includes("3"))) {
            	document.getElementById("notification").style.display = 'none';
            }

            if(!(pages.includes("1")) && !(pages.includes("2")) && !(pages.includes("3"))) {
            	document.getElementById("home_menu").style.display = 'none';
            }
            
            //Access for Students
            if(!(pages.includes("4"))) {
            	document.getElementById("enrollment").style.display = 'none';
            } 
            if(!(pages.includes("5"))) {
            	document.getElementById("std_courses").style.display = 'none';
            }
            if(!(pages.includes("6"))) {
            	document.getElementById("std_programmes").style.display = 'none';
            }
            if(!(pages.includes("7"))) {
            	document.getElementById("resultStatment").style.display = 'none';
            }

            if(!(pages.includes("4")) && !(pages.includes("5")) && !(pages.includes("6")) && !(pages.includes("7"))) {
            	document.getElementById("student_menu").style.display = 'none';
            }
            
            //Access for Services
            if(!(pages.includes("8"))) {
            	document.getElementById("transcripts").style.display = 'none';
            }
            if(!(pages.includes("9"))) {
            	document.getElementById("signatory").style.display = 'none';
            } 
            if(!(pages.includes("10"))) {
            	document.getElementById("scheduler").style.display = 'none';
            }
            if(!(pages.includes("11"))) {
            	document.getElementById("requests").style.display = 'none';
            }
            
            if(!(pages.includes("8")) && !(pages.includes("9")) && !(pages.includes("10")) && !(pages.includes("11"))) {
            	document.getElementById("services_menu").style.display = 'none';
            }

            //Services
            if(!(pages.includes("12"))) {
            	document.getElementById("users").style.display = 'none';
            } 
            if(!(pages.includes("13"))) {
            	document.getElementById("sett_notification").style.display = 'none';
            }
            if(!(pages.includes("14"))) {
            	document.getElementById("sett_programmes").style.display = 'none';
            }
            if(!(pages.includes("15"))) {
            	document.getElementById("sett_courses").style.display = 'none';
            }
            if(!(pages.includes("16"))) {
            	document.getElementById("uploads").style.display = 'none';
            }
            if(!(pages.includes("17"))) {
            	document.getElementById("update").style.display = 'none';
            }
            if(!(pages.includes("18"))) {
            	document.getElementById("log").style.display = 'none';
            }

        }
    })
}

function pages_access () {
	$.ajax({
		url:'../../php/access.php',

		success:function(response) {
			var pages = [];
			var data = JSON.parse(response);

			for(var i = 0; i<data.length; i++) {
				pages.push(data[i].fpage);
			}

            //Access for Home Menu
            if(!(pages.includes("1"))) {
            	document.getElementById("dashboard").style.display = 'none';
            } 
            if(!(pages.includes("2"))) {
            	document.getElementById("profile").style.display = 'none';
            }
            if(!(pages.includes("3"))) {
            	document.getElementById("notification").style.display = 'none';
            }

            if(!(pages.includes("1")) && !(pages.includes("2")) && !(pages.includes("3"))) {
            	document.getElementById("home_menu").style.display = 'none';
            }
            
            //Access for Students
            if(!(pages.includes("4"))) {
            	document.getElementById("enrollment").style.display = 'none';
            } 
            if(!(pages.includes("5"))) {
            	document.getElementById("std_courses").style.display = 'none';
            }
            if(!(pages.includes("6"))) {
            	document.getElementById("std_programmes").style.display = 'none';
            }
            if(!(pages.includes("7"))) {
            	document.getElementById("resultStatment").style.display = 'none';
            }

            if(!(pages.includes("4")) && !(pages.includes("5")) && !(pages.includes("6")) && !(pages.includes("7"))) {
            	document.getElementById("student_menu").style.display = 'none';
            }
            
            //Access for Services
            if(!(pages.includes("8"))) {
            	document.getElementById("transcripts").style.display = 'none';
            }
            if(!(pages.includes("9"))) {
            	document.getElementById("signatory").style.display = 'none';
            } 
            if(!(pages.includes("10"))) {
            	document.getElementById("scheduler").style.display = 'none';
            }
            if(!(pages.includes("11"))) {
            	document.getElementById("requests").style.display = 'none';
            }
            
            if(!(pages.includes("8")) && !(pages.includes("9")) && !(pages.includes("10")) && !(pages.includes("11"))) {
            	document.getElementById("services_menu").style.display = 'none';
            }

            //Services
            if(!(pages.includes("12"))) {
            	document.getElementById("users").style.display = 'none';
            } 
            if(!(pages.includes("13"))) {
            	document.getElementById("sett_notification").style.display = 'none';
            }
            if(!(pages.includes("14"))) {
            	document.getElementById("sett_programmes").style.display = 'none';
            }
            if(!(pages.includes("15"))) {
            	document.getElementById("sett_courses").style.display = 'none';
            }
            if(!(pages.includes("16"))) {
            	document.getElementById("uploads").style.display = 'none';
            }
            if(!(pages.includes("17"))) {
            	document.getElementById("update").style.display = 'none';
            }
            if(!(pages.includes("18"))) {
            	document.getElementById("log").style.display = 'none';
            }

        }
    })
}

function load_programmes () {
	$.ajax({
		url: "../../php/load_programmes.php",

		success: function(json) {
			var data = JSON.parse(json);
			var sett_tbl_body = "";
			var tbl_body = "";
			var option = "<option selected disabled>Select Programme</option>";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var prog_id = data[i].prog_id;
				var prog_name = data[i].prog_name;
				var dept_fk = data[i].dept_name;
				var duration = data[i].duration;
				if(duration == '1') {
					duration = data[i].duration+" - Year";
				} else if (duration > 1) {
					duration = data[i].duration+" - Years";
				} else if (duration < 1) {
					duration = data[i].duration;
				}

				var date_added = moment(data[i].prog_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_prog(\"" + prog_id +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_prog(\"" + prog_id +"\")'>Delete</a></li></ul></div>";

				sett_tbl_body += "<tr><td>"+a+"</td><td>"+prog_name+"</td><td>"+dept_fk+"</td><td>"+duration+"</td><td>"+date_added+"</td><td>"+action+"</td></tr>";
				tbl_body += "<tr><td>"+a+"</td><td>"+prog_name+"</td><td>"+dept_fk+"</td><td>"+duration+"</td><td>"+date_added+"</td></tr>";

				option += "<option value='"+prog_id+"'>"+prog_name+"</option>";
			}
			$("#programme_body").html(sett_tbl_body);
			$("#viewer_programme_body").html(tbl_body);
			$("#course_programme").html(option);
			$("#edit_course_programme").html(option);
			$("#programme_tbl").dataTable();
		}

	})
}

function load_departments () {
	$.ajax({
		url: "../../php/load_departments.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			var option = "<option selected disabled>Select Department</option>";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var dept_id = data[i].dept_id;
				var dept_name = data[i].dept_name;
				var hod = data[i].hod;
				// var faculty_fk = data[i].faculty_fk;
				var faculty_fk = data[i].faculty_name;
				var date_added = moment(data[i].date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_dept(\"" + dept_id +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_dept(\"" + dept_id +"\")'>Delete</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+dept_name+"</td><td>"+hod+"</td><td>"+faculty_fk+"</td><td>"+date_added+"</td><td>"+action+"</td></tr>";

				option += "<option value='"+dept_id+"'>"+dept_name+"</option>";
			}
			$("#dept_body").html(tbl_body);
			$("#prog_department").html(option);
			$("#edit_prog_department").html(option);
			$("#dept_tbl").dataTable();
		}

	})
}

function load_courses () {
	$.ajax({
		url: "../../php/load_courses.php",

		success: function(json) {
			var data = JSON.parse(json);
			var sett_tbl_body = "";
			var tbl_body = "";
			var option = "<option selected disabled>Select Course</option>";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var course_id = data[i].course_id;
				var course_code = data[i].course_code;
				var course_title = data[i].course_title;
				var course_credit = data[i].course_credit;
				var course_level = data[i].course_level;
				var prog_name = data[i].prog_name;
				var date_added = moment(data[i].course_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_course(\"" + course_id +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_course(\"" + course_id +"\")'>Delete</a></li></ul></div>";

				sett_tbl_body += "<tr><td>"+a+"</td><td>"+course_code+"</td><td>"+course_title+"</td><td>"+course_credit+"</td><td>"+course_level+"</td><td>"+prog_name+"</td><td>"+action+"</td></tr>";
				tbl_body += "<tr><td>"+a+"</td><td>"+course_code+"</td><td>"+course_title+"</td><td>"+course_credit+"</td><td>"+course_level+"</td><td>"+prog_name+"</td></tr>";
				option += "<option value='"+course_code+"'>"+course_code+" - "+course_title+"</option>";
			}

			$("#course_body").html(sett_tbl_body);
			$("#viewer_course_body").html(tbl_body);
			$("#search_course").html(option);
			$("#course_tbl").dataTable();
		}

	})
}

function listSession () {
	$.ajax({
		url: '../../php/listSession.php',

		success: function (json) {
			var data = JSON.parse(json);
			var option = "<option selected disabled>Select Session</option>";
			for (var i = 0; i < data.length; i++) {
				var sessionid = data[i].sessionid;
				var sessionname = data[i].sessionname;

				option += "<option value='"+sessionname+"'>"+sessionname+"</option>";
			}
			$("#search_session").html(option);
		}
	})
}

function load_faculty () {
	$.ajax({
		url: "../../php/load_faculty.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			var option = "<option selected disabled>Select Faculty</option>";

			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var fac_id = data[i].faculty_id;
				var fac_name = data[i].faculty_name;
				var dean = data[i].faculty_dean;
				var date_added = moment(data[i].date_added).format("ddd D MMM YYYY - hh:mm:ss");

				var action = "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Action<span class='caret'></span></button><ul class='dropdown-menu'><li><a class='dropdown-item' href='#' onclick='edit_fac(\"" + fac_id +"\")'>Edit</a></li><li><a class='dropdown-item' href='#' onclick='delete_fac(\"" + fac_id +"\")'>Delete</a></li></ul></div>";

				tbl_body += "<tr><td>"+a+"</td><td>"+fac_name+"</td><td>"+dean+"</td><td>"+date_added+"</td><td>"+action+"</td></tr>";

				option += "<option value='"+fac_id+"'>"+fac_name+"</option>";
			}
			$("#faculty_body").html(tbl_body);
			$("#dept_faculty").html(option);
			$("#edit_dept_faculty").html(option);
			$("#faculty_tbl").dataTable();
		}

	})
}

function listUsers () {
	$.ajax({
		url: '../../php/listUsers.php',

		success: function (json) {
			var data = JSON.parse(json);
			var option = "<option selected disabled>Select User</option>";
			for (var i = 0; i < data.length; i++) {
				var name = data[i].name;
				var username = data[i].username;

				option += "<option value='"+username+"'>"+name+"</option>";
			}
			$("#reassign").html(option);
		}
	})
}

function listCountry () {
	$.ajax({
		url: '../../php/listCountry.php',

		success: function (json) {
			var data = JSON.parse(json);
			var option = "<option selected disabled>Select Country</option>";
			for (var i = 0; i < data.length; i++) {
				var countryid = data[i].countryid;
				var country = data[i].country;

				option += "<option value='"+countryid+"'>"+country+"</option>";
			}
			$("#nationality").html(option);
		}
	})
}

function listRegion () {
	$.ajax({
		url: '../../php/listRegion.php',

		success: function (json) {
			var data = JSON.parse(json);
			var option = "<option selected disabled>Select Region</option>";
			for (var i = 0; i < data.length; i++) {
				var regionid = data[i].regionid;
				var regionname = data[i].regionname;

				option += "<option value='"+regionid+"'>"+regionname+"</option>";
			}
			$("#homeregion").html(option);
		}
	})
}

function print(div) {
	printJS({
		printable: div,
		type: 'html',
		scanStyles: true,
		targetStyles: ['*'],
		documentTitle: 'www.gntc.edu.gh',
		css: ["../../custom_css/res_statement.css", "../../plugins/datatables/dataTables.bootstrap4.min.css", "../../css/style.css", "../../plugins/bootstrap/css/bootstrap.min.css", "../../custom_css/profile_print.css"]
	})
}

$(document).ready(function() {
	var year = moment().format("YYYY");
	$("#group_name").html("Copyright © <a href='https://www.mtsystems.com/' target='_blank'>MTSystems.com</a>");
	$("#sys_year").html(year);

	$("#sys_motto").html("You Think, We Deliver");


	notification();
	home_notification();
	home_access();
	pages_access();

	load_programmes ();
	load_departments ();
	load_faculty ();
	load_courses ();
	listSession ();

	listCountry ();
	listRegion ();
})