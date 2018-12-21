<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];

  if (isset($_GET['edit'])) {
   $PARENT_NO = $_GET['edit'];
   
 
 }
 
 if(isset($_POST['Update']))
{      
       $CIRCULAR_TITLE=$_POST['CIRCULAR_TITLE'];
       $MEDIUM=$_POST['MEDIUM'];
       $STUDENT_LEVEL_NO=$_POST['STUDENT_LEVEL_NO'];
       $STUDENT_SUBJECT_NO=$_POST['STUDENT_SUBJECT_NO'];
       $AREA_NO=$_POST['AREA_NO'];
       $TUITION_SCHEDULE_NO=$_POST['TUITION_SCHEDULE_NO'];
       $WEEK=$_POST['WEEK'];
       $STUDENT_NUMBER=$_POST['STUDENT_NUMBER'];
       $SALARY_NO=$_POST['SALARY_NO'];
       $SHORT_DETAILS=$_POST['SHORT_DETAILS'];

         $SQL="UPDATE `gen_parent_circulars`  SET USER_NO='$USER_NO', CIRCULAR_TITLE='$CIRCULAR_TITLE' , 
         MEDIUM='$MEDIUM', STUDENT_LEVEL_NO= '$STUDENT_LEVEL_NO', STUDENT_SUBJECT_NO='$STUDENT_SUBJECT_NO',
         AREA_NO='$AREA_NO',TUITION_SCHEDULE_NO='$TUITION_SCHEDULE_NO', WEEK='$WEEK',  STUDENT_NUMBER='$STUDENT_NUMBER',
         SALARY_NO='$SALARY_NO', SHORT_DETAILS='$SHORT_DETAILS' WHERE `PARENT_NO`='$PARENT_NO' AND `USER_NO`='$USER_NO'";
         $result1 = mysqli_query($conn,$SQL);
         if($result1)
                {
                    $mgs = "Update circular information Successfully"  ;
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                   // header('location:edit_circuler_parent.php');
                }
                else
                {
                    $mgs = "Update circular information Fail!";
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
             <br>
<br>
<br> 
<h3> Update Your Circular Information</h3>
<?php
    $sql = "SELECT * FROM gen_parent_circulars WHERE `PARENT_NO`='$PARENT_NO' AND `USER_NO`='$USER_NO' ";
  $select_query = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($select_query);
  
?>
 <div style="padding: 40px;border: 1px solid;width: 800px;">
       <form class="cmxform form-horizontal " id="signupForm" onsubmit="return checkForm(this);" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a><?=$mgs?></div>
            
        </div>
          
        <div class="form-group ">
            <label for="CIRCULAR_TITLE" class="control-label col-lg-3">Circular Title</label>
            <div class="col-lg-5">
                <select class="form-control" name="CIRCULAR_TITLE" id="CIRCULAR_TITLE">
                     <option value="-1"> --Select Circular--</option>
<option value="HomeTutorWanted" <?php if($result['CIRCULAR_TITLE'] == 'HomeTutorWanted')  echo 'selected'; ?>>Home Tutor Wanted</option>
<option value="UrgentTutorWanted" <?php if($result['CIRCULAR_TITLE'] == 'UrgentTutorWanted')  echo 'selected'; ?>>Urgent Tutor Wanted </option>
<option value="LadyTutorWanted" <?php if($result['CIRCULAR_TITLE'] == 'LadyTutorWanted')  echo 'selected'; ?>> Lady Tutor Wanted</option>

                </select>
                    <span class="error_message" id="error_title" style="color: red;" ></span>
            </div>
            
        </div>
             <div class="form-group ">
            <label for="MEDIUM" class="control-label col-lg-3">Student Medium</label>
            <div class="col-lg-5">
                <select class="form-control" name="MEDIUM" id="MEDIUM">
                    <option value="-1"> --Select Medium--</option>
                    <option value="Bangla" <?php if($result['MEDIUM'] == 'Bangla')  echo 'selected'; ?>>Bangla</option>
                    <option value="English" <?php if($result['MEDIUM'] == 'English')  echo 'selected'; ?>>English</option>
                </select>
                    <span class="error_message" id="error_medium" style="color: red;" ></span>
            </div>
            
        </div>    

        <div class="form-group ">
            <label for="STUDENT_LEVEL_NO" class="control-label col-lg-3">Student Level</label>
            <div class="col-lg-5">
                <select class="form-control" name="STUDENT_LEVEL_NO" id="STUDENT_LEVEL_NO">
                    <option value="-1">--Select Student Level--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_student_levels` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                           <option value="<?=$row['STUDENT_LEVEL_NO']?>" <?php if($result['STUDENT_LEVEL_NO'] == $row['STUDENT_LEVEL_NO'])  echo 'selected'; ?>><?=$row['STUDENT_LEVEL_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_level" style="color: red;" ></span>
            </div>
            
        </div>
                              
                            
         <div class="form-group ">
            <label for="STUDENT_SUBJECT_NO" class="control-label col-lg-3">Prefered Subject</label>
            <div class="col-lg-5">
                <select class="form-control" name="STUDENT_SUBJECT_NO" id="STUDENT_SUBJECT_NO">
                    <option value="-1">--Select Subject--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_student_subjects` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['STUDENT_SUBJECT_NO']?>" <?php if($result['STUDENT_SUBJECT_NO'] == $row['STUDENT_SUBJECT_NO'])  echo 'selected'; ?>><?=$row['STUDENT_SUBJECT_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_subject" style="color: red;" ></span>
            </div>
            
        </div>
        

         <div class="form-group ">
            <label for="AREA_NO" class="control-label col-lg-3">Tuition Area</label>
            <div class="col-lg-5">
                <select class="form-control" name="AREA_NO" id="AREA_NO">
                    <option value="-1">--Select Area--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_areas` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['AREA_NO']?>" <?php if($result['AREA_NO'] == $row['AREA_NO'])  echo 'selected'; ?>><?=$row['AREA_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_area" style="color: red;" ></span>
            </div>
            
        </div>
         <div class="form-group ">
            <label for="TUITION_SCHEDULE_NO" class="control-label col-lg-3">Tuitions Schedule</label>
            <div class="col-lg-5">
                <select class="form-control" name="TUITION_SCHEDULE_NO" id="TUITION_SCHEDULE_NO">
                    <option value="-1">--Select Schedule--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_tuition_schedules` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['TUITION_SCHEDULE_NO']?>" <?php if($result['TUITION_SCHEDULE_NO'] == $row['TUITION_SCHEDULE_NO'])  echo 'selected'; ?>><?=$row['TUITION_SCHEDULE_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_schedule" style="color: red;" ></span>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="WEEK" class="control-label col-lg-3"> Days per week</label>
            <div class="col-lg-5">
                <select class="form-control" name="WEEK" id="WEEK">
                    <option value="-1">--Select Week--</option>
<option value="1Day/Week"<?php if($result['WEEK'] == '1Day/Week')  echo 'selected'; ?>>1Day/Week</option>
<option value="2Day/Week"<?php if($result['WEEK'] == '2Day/Week')  echo 'selected'; ?>>2Day/Week </option>
<option value="3Day/Week"<?php if($result['WEEK'] == '3Day/Week')  echo 'selected'; ?>>3Day/Week</option>
<option value="4Day/Week"<?php if($result['WEEK'] == '4Day/Week')  echo 'selected'; ?>>4Day/Week</option>
<option value="5Day/Week"<?php if($result['WEEK'] == '5Day/Week')  echo 'selected'; ?>>5Day/Week</option>
<option value="6Day/Week"<?php if($result['WEEK'] == '6Day/Week')  echo 'selected'; ?>>6Day/Week</option>
<option value="7Day/Week"<?php if($result['WEEK'] == '7Day/Week')  echo 'selected'; ?>>7Day/Week</option>
                    </select>
                    <span class="error_message" id="error_week" style="color: red;" ></span>
            </div>
            
        </div>

        <div class="form-group ">
            <label for="STUDENT_NUMBER" class="control-label col-lg-3">Number of Students</label>
            <div class="col-lg-5">
                <select class="form-control" name="STUDENT_NUMBER" id="STUDENT_NUMBER">
                    <option value="-1">--select Number--</option>
<option value="1"<?php if($result['STUDENT_NUMBER'] == '1')  echo 'selected'; ?>>1</option>
<option value="2"<?php if($result['STUDENT_NUMBER'] == '2')  echo 'selected'; ?>>2 </option>
<option value="3"<?php if($result['STUDENT_NUMBER'] == '3')  echo 'selected'; ?>>3</option>
<option value="4"<?php if($result['STUDENT_NUMBER'] == '4')  echo 'selected'; ?>>4</option>
<option value="5"<?php if($result['STUDENT_NUMBER'] == '5')  echo 'selected'; ?>>5</option>
<option value="6"<?php if($result['STUDENT_NUMBER'] == '6')  echo 'selected'; ?>>6</option>
<option value="7"<?php if($result['STUDENT_NUMBER'] == '7')  echo 'selected'; ?>>7</option>
<option value="8"<?php if($result['STUDENT_NUMBER'] == '8')  echo 'selected'; ?>>8</option>
<option value="9"<?php if($result['STUDENT_NUMBER'] == '9')  echo 'selected'; ?>>9</option>
<option value="Batch"<?php if($result['STUDENT_NUMBER'] == 'Batch')  echo 'selected'; ?>>Batch</option>
                    </select>
                    <span class="error_message" id="error_number" style="color: red;" ></span>
            </div>
            
        </div>
    
                      
                             
     <div class="form-group ">
            <label for="SALARY_NO" class="control-label col-lg-3">Offered Salary</label>
            <div class="col-lg-5">
                <select class="form-control" name="SALARY_NO" id="SALARY_NO">
                    <option value="-1">--Select Salary--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_salarys` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['SALARY_NO']?>" <?php if($result['SALARY_NO'] == $row['SALARY_NO'])  echo 'selected'; ?>><?=$row['SALARY_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_salary" style="color: red;" ></span>
            </div>
            
        </div>

        <div class="form-group ">
            <label for="SHORT_DETAILS" class="control-label col-lg-3">Circular Details</label>
            <div class="col-lg-5">
                <textarea class="form-control" name="SHORT_DETAILS"  required  ><?=$result['SHORT_DETAILS']?></textarea>
            </div>
         </div>      

        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="Update" value="Update" />
                
            </div>
        </div>
         </div>
    </form>
       
          
        
    </body>

  
    
       <script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        $("#error_title").html("&nbsp;");
        $("#error_medium").html("&nbsp;");
        $("#error_level").html("&nbsp;");
        $("#error_subject").html("&nbsp;");
        $("#error_area").html("&nbsp;");
        $("#error_schedule").html("&nbsp;");
        $("#error_week").html("&nbsp;");
        $("#error_number").html("&nbsp;");
        $("#error_salary").html("&nbsp;");
        
        $("#CIRCULAR_TITLE").attr("class","form-control");
        $("#MEDIUM").attr("class","form-control");
        $("#STUDENT_LEVEL_NO").attr("class","form-control");
        $("#STUDENT_SUBJECT_NO").attr("class","form-control");
        $("#AREA_NO").attr("class","form-control");
        $("#TUITION_SCHEDULE_NO").attr("class","form-control");
        $("#WEEK").attr("class","form-control");
        $("#STUDENT_NUMBER").attr("class","form-control");
        $("#SALARY_NO").attr("class","form-control");
        var CIRCULAR_TITLE =$("#CIRCULAR_TITLE").val().trim();
        
        if(CIRCULAR_TITLE =="-1") {
            $("#error_title").text("Circular itle Name is required");
            $("#CIRCULAR_TITLE").attr("class","form-control error_input");
            $("#CIRCULAR_TITLE").focus();
            return false;
        }
        var MEDIUM =$("#MEDIUM").val().trim();
        
        if(MEDIUM =="-1") {
            $("#error_medium").text("Medium Name is required");
            $("#MEDIUM").attr("class","form-control error_input");
            $("#MEDIUM").focus();
            return false;
        }

        var STUDENT_LEVEL_NO =$("#STUDENT_LEVEL_NO").val().trim();
        
        if(STUDENT_LEVEL_NO =="-1") {
            $("#error_level").text("Student Level Name is required");
            $("#STUDENT_LEVEL_NO").attr("class","form-control error_input");
            $("#STUDENT_LEVEL_NO").focus();
            return false;
        }
        var STUDENT_SUBJECT_NO =$("#STUDENT_SUBJECT_NO").val().trim();
        
        if(STUDENT_SUBJECT_NO =="-1") {
            $("#error_subject").text("Subject Name is required");
            $("#STUDENT_SUBJECT_NO").attr("class","form-control error_input");
            $("#STUDENT_SUBJECT_NO").focus();
            return false;
        }
       
       var AREA_NO =$("#AREA_NO").val().trim();
        
        if(AREA_NO =="-1") {
            $("#error_area").text("Area Name is required");
            $("#AREA_NO").attr("class","form-control error_input");
            $("#AREA_NO").focus();
            return false;
        }

    var TUITION_SCHEDULE_NO =$("#TUITION_SCHEDULE_NO").val().trim();
        
        if(TUITION_SCHEDULE_NO =="-1") {
            $("#error_schedule").text("Tuition Schedule Name is required");
            $("#TUITION_SCHEDULE_NO").attr("class","form-control error_input");
            $("#TUITION_SCHEDULE_NO").focus();
            return false;
        }
         
        var WEEK =$("#WEEK").val().trim();
        
        if(WEEK =="-1") {
            $("#error_week").text("Week is required");
            $("#WEEK").attr("class","form-control error_input");
            $("#WEEK").focus();
            return false;
        }
        var STUDENT_NUMBER =$("#STUDENT_NUMBER").val().trim();
        
        if(STUDENT_NUMBER =="-1") {
            $("#error_number").text("Student Number is required");
            $("#STUDENT_NUMBER").attr("class","form-control error_input");
            $("#STUDENT_NUMBER").focus();
            return false;
        }
       var SALARY_NO =$("#SALARY_NO").val().trim();
        
        if(SALARY_NO =="-1") {
            $("#error_salary").text("Salary is required");
            $("#SALARY_NO").attr("class","form-control error_input");
            $("#SALARY_NO").focus();
            return false;
        }
      
 });
    });
          
</script>