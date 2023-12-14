function load_notification () {
	$.ajax({
		url: "load_notification.php",

		success: function(json) {
			var data = JSON.parse(json);
			var tbl_body = "";
			for (var i = 0, a=1; i < data.length, a<data.length+1; i++, a++) {
				var title = data[i].not_title;
				var message = data[i].not_message;
				var date_added = moment(data[i].not_date_added).format("ddd D MMM YYYY - hh:mm:ss");

				tbl_body += "<div class='notify_container'><div class='notify_header'><div style='float: right;''>"+date_added+"</div><div>"+title+"</div></div><div class='notify_content'>"+message+"</div></div>";
			}
			$("#notification_container").html(tbl_body);
		}

	})
}

$(document).ready(function() {
	load_notification();
	keep_open("keep-open,index");
})