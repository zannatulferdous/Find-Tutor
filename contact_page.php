<?php
include('config/db_connection.php');
 $mgs = '';
 if(isset($_POST['submit']))

{     
       
       $NAME=$_POST['NAME'];
       $EMAIL=$_POST['EMAIL'];
       $PHONE=$_POST['PHONE'];
       $SUBJECT=$_POST['SUBJECT'];
       $MESSAGE=$_POST['MESSAGE'];
       
      
 
         $sql="INSERT INTO gen_contacts(NAME,EMAIL,PHONE,SUBJECT,MESSAGE) 
 
         VALUES('$NAME','$EMAIL','$PHONE','$SUBJECT','$MESSAGE')";
         $result = mysqli_query($conn,$sql);
         if($result)
                {
         
                    $mgs = "Message send Successfully"  ;
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                   
                }
                else
                {
                    $mgs = "Data Insert Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            
} 
?>
<?php include'header.php'; ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">  <table><center><p style="width: 800px;color:black;font-weight: bold;">Contact Form</p>  </center></table>
     <div style="padding:20px;" align="center">
<form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
<div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
         <div class="form-group ">
            <label for="NAME" class="control-label col-lg-3">Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="NAME" name="NAME" type="text"  required/> 
                 <span class="error_message" id="error_name" style="color:red;" ></span>
            </div>
        </div>

        <div class="form-group ">
            <label for="EMAIL" class="control-label col-lg-3">Email  </label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL" name="EMAIL" type="email"  />
                <span class="error_message" id="error_email" style="color: red;" ></span> 
            </div>
        </div>
        <div class="form-group ">
            <label for="PHONE" class="control-label col-lg-3">Phone </label>
            <div class="col-lg-5">
                <input class=" form-control" id="PHONE" name="PHONE" type="text" />
                <span class="error_message" id="error_contact" style="color: red;"  ></span>  
            </div>
        </div>
              
        <div class="form-group ">
            <label for="SUBJECT" class="control-label col-lg-3">Subject</label>
            <div class="col-lg-5">
                <input type="text" class=" form-control"id="SUBJECT" name="SUBJECT"/><br>
                <span class="error_message" id="error_subject" style="color: red;"  ></span>    
            </div>
            
        </div>   
      <div class="form-group ">
            <label for="MESSAGE" class="control-label col-lg-3">Message </label>
            <div class="col-lg-5">
                <textarea class="form-control" name="MESSAGE"  required></textarea>
            </div>
         </div>
             

        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary"id="submit" name="submit" value="Submit" />
                
            </div>
        </div>
                
            </form>  
          </div>

  
</div>
    </div>
<?php include'footer.php'; ?>

<script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        $("#error_name").html("&nbsp;");
        $("#error_email").html("&nbsp;");
        $("#error_contact").html("&nbsp;");
        $("#error_subject").html("&nbsp;");
       

        $("#NAME").attr("class","form-control");
        $("#EMAIL").attr("class","form-control");
        $("#PHONE").attr("class","form-control");
        $("#SUBJECT").attr("class","form-control");
        


       var NAME = $("#NAME").val().trim();
        
        if(NAME == "") {
            $("#error_name").text("Name is required");
            $("#NAME").attr("class","form-control error_input");
            $("#NAME").focus();
            return false;
        }
        var EMAIL = $("#EMAIL").val().trim();
        
      if(EMAIL == "") {
            $("#error_email").text("Email is required");
            $("#EMAIL").attr("class","form-control error_input");
            $("#EMAIL").focus();
            return false;
        }
         
        var PHONE = $("#PHONE").val().trim();
        
        if(PHONE == "") {
            $("#error_contact").text("Contact is required");
            $("#PHONE").attr("class","form-control error_input");
            $("#PHONE").focus();
            return false;
        }
        var checkOP = PHONE.substring(0,3);
        if(isNaN(PHONE) || PHONE.length != 11){
          
                    
                    $("#error_contact").text("Contact must be 11 Digit");
                    $("#PHONE").val("");
                    $("#PHONE").focus();
                    return false;
        }else if(!(checkOP == "015" || checkOP == "016" || checkOP == "017" || checkOP == "018" || checkOP == "019")){
                                  
                      $("#error_contact").text("please give valid contact"); 
                      $("#PHONE").val("");
                      $("#PHONE").focus();
                      return false;
                }
       
       var SUBJECT = $("#SUBJECT").val().trim();
        
        if(SUBJECT == "") {
            $("#error_subject").text("Subject is required");
            $("#SUBJECT").attr("class","form-control error_input");
            $("#SUBJECT").focus();
            return false;
        }
           
        });
    });

</script>

