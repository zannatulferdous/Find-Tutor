

<?php
include('config/db_connection.php');
 $mgs = '';
 if(isset($_POST['submit']))
{
       $USER_TYPE_NO=$_POST['USER_TYPE_NO'];
       $FULL_NAME=$_POST['FULL_NAME'];
       $EMAIL=$_POST['EMAIL'];
       $MOBILE=$_POST['MOBILE'];
       $DIVISION_NO=$_POST['DIVISION_NO'];
       $DISTRICT_NO=$_POST['DISTRICT_NO'];
       $ADDRESS=$_POST['ADDRESS'];
       $GENDER_NO=$_POST['GENDER_NO'];
       $USER_NAME=$_POST['USER_NAME'];
       $PASSWORD=$_POST['PASSWORD'];
       $md5PASSWORD = md5($PASSWORD);
       $SQL = "SELECT USER_NAME FROM gen_users WHERE `IS_DELETED` = 0  AND `USER_NAME` = '$USER_NAME' ";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
              
           if ($_FILES["PROFILE_IMAGE"]["error"] > 0) 
           {
                $PROFILE_IMAGE="No.jpg";
                
           } else 

           {
                $PROFILE_IMAGE=time().$_FILES["PROFILE_IMAGE"]["name"];
                move_uploaded_file($_FILES["PROFILE_IMAGE"]["tmp_name"],"upload/".$PROFILE_IMAGE);
           }

 
         $sql="INSERT INTO gen_users(USER_TYPE_NO,FULL_NAME,EMAIL,MOBILE,DIVISION_NO,DISTRICT_NO,ADDRESS,
          GENDER_NO,USER_NAME,PASSWORD,PROFILE_IMAGE) 
 
         VALUES('$USER_TYPE_NO','$FULL_NAME','$EMAIL','$MOBILE','$DIVISION_NO','$DISTRICT_NO','$ADDRESS',
          '$GENDER_NO','$USER_NAME','$md5PASSWORD','$PROFILE_IMAGE')";
         $result = mysqli_query($conn,$sql);
         if($result)
                {
         
                    $mgs = "Registration Successfully! Please login"  ;
                    $class = "green_color alert alert-success col-md-8 alert-dismissable";
                    echo "<meta http-equiv='Refresh' content='3; url=login.php'>";
                   
                }
                else
                {
                    $mgs = "Data Insert Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-8";
                }
            else:
                $mgs = "This username is already taken,please try another!";
                $class = "red_color alert alert-warning alert-dismissable col-md-8";
            endif;
            
}

?>
<?php include'header.php'; ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
    <div class="container">
        
      <div id="reg">
        <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-8  <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
        <div id="rg">
          <h2>Registration </h2> 
          <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">User Type</label>
            <div class="col-lg-5" >
                <select class=" form-control" name="USER_TYPE_NO" id="USER_TYPE_NO">
          <option value="-1"> --Select User Type--</option>
          <option value="1">Tutor</option>
          <option value="2">Parent</option>
          </select> 
          <span class="error_message" id="error_usertype" style="color:red;" ></span>
            </div>
            </div>
        <div class="form-group ">
            <label for="FULL_NAME" class="control-label col-lg-3">Full Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="FULL_NAME" name="FULL_NAME" type="text"  required/> 
                 <span class="error_message" id="error_name" style="color:red;" ></span>
            </div>
        </div>

        <div class="form-group ">
            <label for="EMAIL" class="control-label col-lg-3">Email  </label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL" name="EMAIL" type="email"  required />
                <span class="error_message" id="error_email" style="color: red;" ></span> 
            </div>
        </div>
        <div class="form-group ">
            <label for="MOBILE" class="control-label col-lg-3">Mobile </label>
            <div class="col-lg-5">
                <input class=" form-control" id="txtPhoneNumber" name="MOBILE" type="text" />
                <span class="error_message" id="error_contact" style="color: red;" ></span>  
            </div>
        </div>

        
        <div class="form-group ">
            <label for="DIVISION_NO" class="control-label col-lg-3">Division </label>
            <div class="col-lg-5">
                <select class="form-control" name="DIVISION_NO" id="DIVISION_NO">
                    <option value="-1">--Select Division--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_divisions` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['DIVISION_NO']?>" ><?=$row['DIVISION_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_division" style="color: red;" ></span>
            </div>
            
        </div>
        <div class="form-group" id="show_district" >
            <label for="class_no" class="control-label col-lg-3">District</label>
            <div class="col-lg-5" >
                <select class="form-control" id="DISTRICT_NO" name="DISTRICT_NO">
                    <option value="-1">--Select District--</option>
                </select>   
                 <span class="error_message" id="error_district" style="color: red;" ></span>  
            </div>
            </div>
            <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Contact Address </label>
            <div class="col-lg-5">
                <textarea class="form-control" name="ADDRESS"  required></textarea>
            </div>
         </div>
         <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Gender</label>
            <div class="col-lg-5">
               <input type="radio" name="GENDER_NO" value ="1" required >Male<br>
               <input type="radio" name="GENDER_NO" value ="2" required >Female <br>
            </div>
         </div>


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
       <div class="form-group ">
            <label for="RE_PASSWORD" class="control-label col-lg-3">Confirm Password</label>
            <div class="col-lg-5">
                <input class=" form-control" id="RE_PASSWORD" name="RE_PASSWORD" type="PASSWORD"  required/>
            </div>
            <span class="error_message" id="CPASSWORD_ERROR" style="color: red;font-weight: bold;"></span>
        
        </div>
        <div class="form-group ">
            <label for="PROFILE_IMAGE" class="control-label col-lg-3">Upload Photo</label>
            <div class="col-lg-5">
                <input class=" form-control"type="file" id="PROFILE_IMAGE" name="PROFILE_IMAGE"   required />
            </div>
        </div>
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add" />
                
            </div>
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
        $("#error_usertype").html("&nbsp;");
        $("#error_name").html("&nbsp;");
        $("#error_email").html("&nbsp;");
        $("#error_contact").html("&nbsp;");
        $("#error_division").html("&nbsp;");
        $("#error_district").html("&nbsp;");
        $("#username_error").html("&nbsp;");
        $("#PASSWORD_ERROR").html("&nbsp;");
        $("#CPASSWORD_ERROR").html("&nbsp;");


        $("#USER_TYPE_NO").attr("class","form-control");
        $("#FULL_NAME").attr("class","form-control");
        $("#EMAIL").attr("class","form-control");
        $("#txtPhoneNumber").attr("class","form-control");
        $("#DIVISION_NO").attr("class","form-control");
        $("#DISTRICT_NO").attr("class","form-control");
        $("#USER_NAME").attr("class","form-control");
        $("#PASSWORD").attr("class","form-control");
        $("#RE_PASSWORD").attr("class","form-control");

       var USER_TYPE_NO = $("#USER_TYPE_NO").val().trim();
        
        if(USER_TYPE_NO == "-1") {
            $("#error_usertype").text("User Type is required");
            $("#USER_TYPE_NO").attr("class","form-control error_input");
            $("#USER_TYPE_NO").focus();
            return false;
        }


       var FULL_NAME = $("#FULL_NAME").val().trim();
        
        if(FULL_NAME == "") {
            $("#error_name").text("Name is required");
            $("#FULL_NAME").attr("class","form-control error_input");
            $("#FULL_NAME").focus();
            return false;
        }
        var EMAIL = $("#EMAIL").val().trim();
        
      if(EMAIL == "") {
            $("#error_email").text("Email is required");
            $("#EMAIL").attr("class","form-control error_input");
            $("#EMAIL").focus();
            return false;
        }
         
        var txtPhoneNumber = $("#txtPhoneNumber").val().trim();
        
        if(txtPhoneNumber == "") {
            $("#error_contact").text("Contact is required");
            $("#txtPhoneNumber").attr("class","form-control error_input");
            $("#txtPhoneNumber").focus();
            return false;
        }
        var checkOP = txtPhoneNumber.substring(0,3);
        if(isNaN(txtPhoneNumber) || txtPhoneNumber.length != 11){
          
                    
                    $("#error_contact").text("Contact must be 11 Digit");
                    $("#txtPhoneNumber").val("");
                    $("#txtPhoneNumber").focus();
                    return false;
        }else if(!(checkOP == "015" || checkOP == "016" || checkOP == "017" || checkOP == "018" || checkOP == "019")){
                                  
                      $("#error_contact").text("please give valid contact"); 
                      $("#txtPhoneNumber").val("");
                      $("#txtPhoneNumber").focus();
                      return false;
                }
       
        var DIVISION_NO = $("#DIVISION_NO").val().trim();
        
        if(DIVISION_NO == "-1") {
            $("#error_division").text("Division is required");
            $("#DIVISION_NO").attr("class","form-control error_input");
            $("#DIVISION_NO").focus();
            return false;
        }
        
        var DISTRICT_NO = $("#DISTRICT_NO").val().trim();
        
        if(DISTRICT_NO == "-1") {
            $("#error_district").text("District is required");
            $("#DISTRICT_NO").attr("class","form-control error_input");
            $("#DISTRICT_NO").focus();
            return false;
        }
        var USER_NAME = $("#USER_NAME").val().trim();
        
      if(USER_NAME == "") {
            $("#username_error").text("User Name is required");
            $("#USER_NAME").attr("class","form-control error_input");
            $("#USER_NAME").focus();
            return false;
        }

            var PASSWORD = $("#PASSWORD").val().length;
            if (PASSWORD <6){
                      $("#PASSWORD_ERROR").text("Insert a password of at least 6 digits"); 
                      $("#PASSWORD").val("");
                      $("#PASSWORD").focus();
                      return false;
                }
            var PASSWORD = $("#PASSWORD").val().trim();
            var RE_PASSWORD = $("#RE_PASSWORD").val().trim();
            if(PASSWORD != RE_PASSWORD){
                $("#CPASSWORD_ERROR").text("Password Mismatch!");
                return false;
            }
           
        });
    });
// division code start
    $(document).ready(function(){
        $("#DIVISION_NO").on("change",function(){
            var DIVISION_NO = $(this).val();
            if(DIVISION_NO!= -1){
                $.post("ajax/get_districts.php",{DIVISION_NO:DIVISION_NO},function(data){
                    if(data.trim().length > 0){
                        $("#DISTRICT_NO").html(data);
                        
                    }
                });


            }else{
                $("#DISTRICT_NO").html("<option value='-1'>--Select District--</option>");
                
            }
        });
    });
// division code End
</script>
