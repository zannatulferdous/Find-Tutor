    <!DOCTYPE html>
<html >

    <head>
        <script src="js/registration.js"></script>
      <link href="css/login.css" rel="stylesheet" type="text/css">
     <link href="css/registration.css" rel="stylesheet" type="text/css">
     <script src="js/jquery.js"></script>
  </head>
<?php
include('../config/db_connection.php');
session_start();
$mgs= "";

if(isset($_POST["submit"]))
  {
        $USER_NAME=trim($_POST["USER_NAME"]);	
        $PASSWORD=trim($_POST["PASSWORD"]);	
        $md5PASSWORD = md5($PASSWORD);
        $sql="select * from gen_users where USER_NAME='$USER_NAME' && PASSWORD='$md5PASSWORD'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

             if($row['USER_NAME']==$USER_NAME&&$row['PASSWORD']==$md5PASSWORD)
             {
	           $_SESSION["user_name"]=$USER_NAME;
             $_SESSION["user_no"] =$row['USER_NO'];
             // $_SESSION['last_activitys'] = time(); 
              $_SESSION["USER_TYPE_NO"] =$row['USER_TYPE_NO'];
                 if($row['USER_TYPE_NO']==3) 
                {
                header('location:index.php');
                }
             
              }
                else
                {
	              $mgs="Your Username or Password is not valid!";
	              }
 
  }

// if(isset($_SESSION["user_no"]))
//  {
    
//  }

// if(isset($_GET["session_expired"])) 
// {
// 	$mgs = "Login Session is Expired. Please Login Again";
// }

?>
<body> 
    <!-- Main jumbotron for a primary marketing message or call to action -->

           
    <div id="main">
    <div id="login">
    <h2 text-align="center">LOGIN</h2> 
    <p class="error_message" style="color:red;"><?=$mgs?></p>
    <form action="" method="post" >
   <div class="form-group ">
            <label for="USER_NAME" class="control-label col-lg-3">User Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="USER_NAME" name="USER_NAME" type="text"   required />
            </div>
            <span class="error_message"id="username_error" style="color: red;"></span>
        </div>
        <div class="form-group ">
            <label for="PASSWORD" class="control-label col-lg-3">Password</label>
            <div class="col-lg-5">
                <input class=" form-control" id="PASSWORD" name="PASSWORD" type="PASSWORD"  required />
                <span class="error_message" id="PASSWORD_ERROR" style="color: red;"></span>
            </div>
            
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit" />
                
            </div>
        </div>
    </form>
    </div>
    </div>
            

    </body> 
    </html>


<script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        
        $("#username_error").html("&nbsp;");
        $("#PASSWORD_ERROR").html("&nbsp;");
        
        $("#USER_NAME").attr("class","form-control");
        $("#PASSWORD").attr("class","form-control");
        

       
        var USER_NAME = $("#USER_NAME").val().trim();
        
      if(USER_NAME == "") {
            $("#username_error").text("User Name is required");
            $("#USER_NAME").attr("class","form-control error_input");
            $("#USER_NAME").focus();
            return false;
        }

            var PASSWORD = $("#PASSWORD").val().length;
            if (PASSWORD ==""){
                      $("#PASSWORD_ERROR").text("Password is required"); 
                      $("#PASSWORD").val("");
                      $("#PASSWORD").focus();
                      return false;
                }
           
        });
    });

</script>
