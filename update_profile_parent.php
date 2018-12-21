<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];
 $sql = "SELECT * FROM gen_users WHERE `USER_NO`='$USER_NO' ";
 $result = mysqli_fetch_array(mysqli_query($conn,$sql));

 if(isset($_POST['Update']))
{
       $FULL_NAME=$_POST['FULL_NAME'];
       $EMAIL=$_POST['EMAIL'];
       $MOBILE=$_POST['MOBILE'];
       $DIVISION_NO=$_POST['DIVISION_NO'];
       $DISTRICT_NO=$_POST['DISTRICT_NO'];
       $ADDRESS=$_POST['ADDRESS'];
       $GENDER_NO=$_POST['GENDER_NO'];

        if ($_FILES["PROFILE_IMAGE"]["error"] > 0) 
       {
            $PROFILE_IMAGE=$_POST['PROFILE_IMAGE'];
            
       } else 

       {
            $PROFILE_IMAGE=time().$_FILES["PROFILE_IMAGE"]["name"];
            move_uploaded_file($_FILES["PROFILE_IMAGE"]["tmp_name"],"upload/".$PROFILE_IMAGE);
       }
 
         $SQL="UPDATE `gen_users`  SET FULL_NAME='$FULL_NAME' , EMAIL='$EMAIL', MOBILE= '$MOBILE', DIVISION_NO='$DIVISION_NO',DISTRICT_NO='$DISTRICT_NO',ADDRESS='$ADDRESS', GENDER_NO='$GENDER_NO', PROFILE_IMAGE='$PROFILE_IMAGE'
          WHERE `USER_NO`='$USER_NO'";
         $result1 = mysqli_query($conn,$SQL);
         if($result1)
                {
                    $mgs = "Update profile information Successfully"  ;
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                   // header('location:update_profile_parent.php');
                    echo "<meta http-equiv='Refresh' content='1; url=update_profile_parent.php'>";
                }
                else
                {
                    $mgs = "Update profile information Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            
}

 ?>
<?php include("link.php"); ?>
         <!-- parent works -->

         <div class="col-1  left" > 
            <ul> <br> <br>
     <h3> PARENT ACCOUNT</h3><li> </li>
     <li> <a href="parent_homepage.php">Parent Profile</a></li>
            <li><a href="reset_password_parent.php">Reset Password</a></li>
            <li><a href="update_profile_parent.php">Edit My Profile</a></li>
            <li><a href="edit_circuler_parent.php">My Circulars</a></li>
            <li><a href="parent_circular_page.php">Publish new Circular</a></li>
        </ul>

</div>


<div class="col-2 right"> 
            
            
<br>
<br> 

<h3 text-aline="center"> Edit Your Profile Info</h3>
<div id="reg">
        <form class="cmxform form-horizontal " id="signupForm" onsubmit="return checkForm(this);" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a><?=$mgs?></div>
            
        </div>
  
          
          
        <div class="form-group ">
            <label for="FULL_NAME" class="control-label col-lg-3">Full Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="FULL_NAME" name="FULL_NAME"   value="<?=$result['FULL_NAME']?>" type="text"  required/> 
                 <span class="error_message" id="error_name" style="color:red;" ></span>
            </div>
        </div>

        <div class="form-group ">
            <label for="EMAIL" class="control-label col-lg-3">Email  </label>
            <div class="col-lg-5">
                <input class=" form-control" id="EMAIL" name="EMAIL" type="email" value="<?=$result['EMAIL']?>" required />
                <span class="error_message" id="error_email" style="color: red;" ></span> 
            </div>
        </div>
        <div class="form-group ">
            <label for="MOBILE" class="control-label col-lg-3">Mobile </label>
            <div class="col-lg-5">
                <input class=" form-control" id="txtPhoneNumber" name="MOBILE" value="<?=$result['MOBILE']?>" type="text" />
                <span class="error_message" id="error_contact" style="color: red;"  required></span>  
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
                            <option value="<?=$row['DIVISION_NO']?>" <?php if($result['DIVISION_NO'] == $row['DIVISION_NO'])  echo 'selected'; ?>><?=$row['DIVISION_NAME']?></option>
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
                    <?php
                        $sql = "SELECT `DISTRICT_NO`, `DISTRICT_NAME` FROM `gen_districts` 
                        WHERE IS_DELETED=0 AND `DIVISION_NO` = ".$result['DIVISION_NO'] ;
                        $query = mysqli_query($conn,$sql);
                        while($row = mysqli_fetch_array($query)):
                    ?>
                    <option value="<?=$row['DISTRICT_NO']?>"<?php if($result['DISTRICT_NO'] == $row['DISTRICT_NO'])  echo 'selected'; ?>><?=$row['DISTRICT_NAME']?></option>
                    <?php endwhile;?>
                </select>    
                <span class="error_message" id="error_district" style="color: red;" ></span> 
            </div>
             
        </div>
            <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Contact Address </label>
            <div class="col-lg-5">
                <textarea class="form-control" name="ADDRESS"  required  ><?=$result['ADDRESS']?></textarea>
            </div>
         </div>
         <div class="form-group ">
            <label for="ADDRESS" class="control-label col-lg-3">Gender</label>
            <div class="col-lg-5">
               <input type="radio" name="GENDER_NO" value ="1"  <?=($result['GENDER_NO'] == 1)?'checked':''?> >Male<br>
               <input type="radio" name="GENDER_NO" value ="2"  <?=($result['GENDER_NO'] == 2)?'checked':''?>>Female <br>
            </div>
         </div>

        <div class="form-group ">
            <label for="PROFILE_IMAGE" class="control-label col-lg-3">Upload Photo</label>
            <div class="col-lg-5">
              <img src="upload/<?=$result['PROFILE_IMAGE']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"/>
                <input class=" form-control"type="file" id="PROFILE_IMAGE" name="PROFILE_IMAGE" />
                 <input type="hidden" name="PROFILE_IMAGE" value="<?=$result['PROFILE_IMAGE']?>" />
            </div>
        </div>
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary"id="submit" name="Update" value="Update" />
                
            </div>
        </div>
         </div>
    </form>
      </div> 

   
    
    </div>

    </body>
 <script type="text/javascript">


 // division start
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
<script>
    $(document).ready(function(){
      
      
      $("#submit").on("click",function(){

        $("#error_name").html("&nbsp;");
        $("#error_email").html("&nbsp;");
        $("#error_contact").html("&nbsp;");
        $("#error_division").html("&nbsp;");
        $("#error_district").html("&nbsp;");

       
        $("#FULL_NAME").attr("class","form-control");
        $("#EMAIL").attr("class","form-control");
        $("#txtPhoneNumber").attr("class","form-control");
        $("#DIVISION_NO").attr("class","form-control");
        $("#DISTRICT_NO").attr("class","form-control");


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
        var txtPhoneNumber = $("#txtPhoneNumber").val().trim();

        
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

      });
    });
    </script>