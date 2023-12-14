function load_logs () {
	$.ajax({
		url: "load_logs.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var activity = data[i].log_activity;
				var user = data[i].log_user;
				var date_added = moment(data[i].log_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				tbl_body += "<tr><td>"+a+"</td><td>"+activity+"</td><td>"+user+"</td><td>"+date_added+"</td></tr>";
			}
			$("#log_body").html(tbl_body);
			$("#log_tbl").dataTable();
		}

	})
}

$(document).ready(function() {
	load_logs();
})