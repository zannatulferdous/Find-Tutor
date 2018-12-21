$(document).ready(function(){
	$("#login").on("click",function(){
		$("#username_mgs").html("&nbsp;");
		$("#password_mgs").html("&nbsp;");
		$("#username").attr("class","form-control");
		$("#password").attr("class","form-control");
		var username = $("#username").val().trim();
		var password = $("#password").val().trim();
		if(username == ""){
			$("#username_mgs").text(reguired_message);
			$("#username").attr("class","form-control error_input");
			return false;
		}
		if(password == ""){
			$("#password_mgs").text(reguired_message);
			$("#password").attr("class","form-control error_input");
			return false;
		}
	});
});