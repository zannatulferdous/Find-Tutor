$(document).ready(function() {
    function getBaseURL() {
        return location.protocol + "//" + location.hostname + (location.port && ":" + location.port) + "/"+window.location.pathname.split('/')[1]+"/";
    }
    
    $("#btnsave").on("click",function() {
		$("#name_mgs").html("&nbsp;");
		$("#mobile_mgs").html("&nbsp;");
		
        
        
		$("#name").attr("class","form-control");
		$("#mobile").attr("class","form-control");
		
        
		var name = $("#name").val().trim();
		var mobile = $("#mobile").val().trim();
		var email = $("#email").val().trim();
		var address = $("#address").val().trim();
		var homme_district = $("#homme_district").val();
		var gender = 1;
		$(".gender").each(function(){
			if($(this).prop("checked") == true)
				gender = $(this).val();
		});
		var dob = $("#dob").val().trim();
		var occupation = $("#occupation").val().trim();
		var id_type = $("#id_type").val().trim();
		var id_number= $("#id_number").val().trim();
		var problem_type = $("#problem_type").val().trim();
		var problem_details = $("#problem_details").val().trim();
		
		
        
        if(name == "") {
			$("#name_mgs").text(reguired_message);
			$("#name").attr("class","form-control error_input");
			return false;
		}
		if(mobile == "") {
			$("#mobile_mgs").text(reguired_message);
			$("#mobile").attr("class","form-control error_input");
			return false;
		}
        
        $.post(getBaseURL()+ "bll/client_reg_form.php",
		{
			name:name, 
			mobile:mobile, 
			email: email,
			address:address , 
			homme_district:homme_district, 
			gender:gender, 
			dob:dob, 
			occupation:occupation, 
			id_type:id_type, 
			id_number:id_number, 
			problem_type:problem_type, 
			problem_details:problem_details,
		},
		function( data ) {
            //$( ".result" ).html( data );
        }, "json");                 
        return false;
	});
});