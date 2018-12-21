<?php
include('config/db_connection.php');
 session_start();
$message="";

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
	           $_SESSION["USER_NAME"]=$USER_NAME;
             $_SESSION["USER_NO"] =$row['USER_NO'];
             $_SESSION['last_activity'] = time(); 

                if($row['USER_TYPE_NO']==1)
                {
                header('location:Tutor_homepage.php');
                }
                else if($row['USER_TYPE_NO']==2) 
                {
                header('location:Parent_homepage.php');
                }
             
              }
                else
                {
	              $message = "Invalid User Name or Password!"; 
	              }
 
  }

if(isset($_SESSION["USER_NO"]))
 {
    
 }

if(isset($_GET["session_expired"])) 
{
	$message = "Login Session is Expired. Please Login Again";
}

?>
<?php include'header.php'; ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
<div class="container">
           
    <div id="main">
    <div id="login">
    <h2 text-align="center">LOGIN</h2>
    <p class="error_message" style="color:red;font-size:13px;"><?=$message?></p>
    <form action="" method="post" >
       <div class="form-group ">
            <label for="USER_NAME" >User Name</label>
            <div >
                <input class=" form-control" id="USER_NAME" name="USER_NAME" type="text"   required />
            </div>
            <span class="error_message"id="username_error" style="color: red;"></span>
        </div>
        <div class="form-group ">
            <label for="PASSWORD" >Password</label>
            <div >
                <input class="form-control" id="PASSWORD" name="PASSWORD" type="PASSWORD"  required />
                <span class="error_message" id="PASSWORD_ERROR" style="color: red;"></span>
            </div>
            
        </div>
        <div class="form-group">
            <div >
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit" />
                
            </div>
        </div>
    <label>Not yet registered?</label> <a href="register.php">Register Now</a></a>
    </form>
    </div>
    </div>
            
</div>
</div>
    
<?php include'footer.php'; ?>

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
