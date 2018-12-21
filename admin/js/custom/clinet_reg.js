$(document).ready(function(){
	$("#btnsave").on("click",function(){
		$("#name_mgs").html("&nbsp;");
		$("#mobile_mgs").html("&nbsp;");
		$("#email_mgs").html("&nbsp;");
		$("#address_mgs").html("&nbsp;");
		$("#home_district_mgs").html("&nbsp;");
		$("#gender_mgs").html("&nbsp;");
		$("#dob_mgs").html("&nbsp;");
		$("#occupation_mgs").html("&nbsp;");
		$("#id_type_mgs").html("&nbsp;");
		$("#id_number_mgs").html("&nbsp;");
		$("#problem_type_mgs").html("&nbsp;");
		$("#problem_details_mgs").html("&nbsp;");
		
		$("#name_mgs").attr("class","form-control");
		$("#mobile_mgs").attr("class","form-control");
		$("#email_mgs").attr("class","form-control");
		$("#address_mgs").attr("class","form-control");
		$("#home_district_mgs").attr("class","form-control");
		$("#gender_mgs").attr("class","form-control");
		$("#dob_mgs").attr("class","form-control");
		$("#occupation_mgs").attr("class","form-control");
		$("#id_type_mgs").attr("class","form-control");
		$("#id_number_mgs").attr("class","form-control");
		$("#problem_type_mgs").attr("class","form-control");
		$("#problem_details_mgs").attr("class","form-control");
	
		var name = $("#name").val().trim();
		var mobile = $("#mobile").val().trim();
		var email = $("#email").val().trim();
		var address = $("#address").val().trim();
		var homme_district = $("#homme_district").val().trim();
		var dob = $("#dob").val().trim();
		var occupation = $("#occupation").val().trim();
		var id_type = $("#id_type").val().trim();
		var id_number = $("#id_number").val().trim();
		var problem_type = $("#problem_type").val().trim();
		var problem_details = $("#problem_details").val().trim();
	
		if(name == ""){
			$("#name_mgs").text(You c);
			$("#name").attr("class","form-control error_input");
			return false;
		}
		if(mobile == ""){
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
		if(email == ""){
			$("#email_mgs").text(reguired_message);
			$("#email").attr("class","form-control error_input");
			return false;
		}
		if(mobile == ""){
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
		if(mobile == ""){
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
		if(mobile == ""){
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
		if(mobile == ""){
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
	});
});