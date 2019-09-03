<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];
 if (isset($_GET['edit'])) {
   $TUTOR_NO = $_GET['edit'];
   
 
 }
 if(isset($_POST['update']))
{
       $AREA_NO=$_POST['AREA_NO'];
       $DOB=$_POST['DOB'];
       $NATIONALITY=$_POST['NATIONALITY'];
       $NATIONAL_ID_NUM=$_POST['NATIONAL_ID_NUM'];
       $SHORT_INFORMATION=$_POST['SHORT_INFORMATION'];
       $EDUCATION_LEVEL=$_POST['EDUCATION_LEVEL'];
       $SUBJECT=$_POST['SUBJECT'];
       $INSTITUTE=$_POST['INSTITUTE'];
       $STUDENT_SUBJECT_NO=$_POST['STUDENT_SUBJECT_NO'];
        $STUDENT_LEVEL_NO=$_POST['STUDENT_LEVEL_NO'];
       $TUITION_SCHEDULE_NO=$_POST['TUITION_SCHEDULE_NO'];
       $SALARY_NO=$_POST['SALARY_NO'];
       $SQL = "SELECT NATIONAL_ID_NUM FROM gen_tutor_circulars WHERE `NATIONAL_ID_NUM` = '$NATIONAL_ID_NUM' ";
       $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
       if ($_FILES["NATIONAL_ID_IMAGE"]["error"] > 0) 
       {
            $NATIONAL_ID_IMAGE=$_POST['NATIONAL_ID_IMAGE'];
            
       } else 

       {
            $NATIONAL_ID_IMAGE=time().$_FILES["NATIONAL_ID_IMAGE"]["name"];
            move_uploaded_file($_FILES["NATIONAL_ID_IMAGE"]["tmp_name"],"upload1/".$NATIONAL_ID_IMAGE);
       }
       if ($_FILES["TUTOR_ID_CARD_IMAGE"]["error"] > 0) 
       {
            $TUTOR_ID_CARD_IMAGE=$_POST['TUTOR_ID_CARD_IMAGE'];
            
       } else 

       {
            $TUTOR_ID_CARD_IMAGE=time().$_FILES["TUTOR_ID_CARD_IMAGE"]["name"];
            move_uploaded_file($_FILES["TUTOR_ID_CARD_IMAGE"]["tmp_name"],"upload1/".$TUTOR_ID_CARD_IMAGE);
       }
       
         $SQL="UPDATE gen_tutor_circulars SET USER_NO='$USER_NO',AREA_NO='$AREA_NO',DOB='$DOB',NATIONALITY='$NATIONALITY'
         ,NATIONAL_ID_NUM='$NATIONAL_ID_NUM',NATIONAL_ID_IMAGE='$NATIONAL_ID_IMAGE',SHORT_INFORMATION='$SHORT_INFORMATION'
         ,EDUCATION_LEVEL='$EDUCATION_LEVEL',TUTOR_ID_CARD_IMAGE='$TUTOR_ID_CARD_IMAGE',SUBJECT='$SUBJECT',INSTITUTE='$INSTITUTE',
         TUITION_SCHEDULE_NO='$TUITION_SCHEDULE_NO',STUDENT_LEVEL_NO='$STUDENT_LEVEL_NO',STUDENT_SUBJECT_NO='$STUDENT_SUBJECT_NO',
         SALARY_NO='$SALARY_NO' WHERE TUTOR_NO=$TUTOR_NO AND `USER_NO`='$USER_NO'";
         $query = mysqli_query($conn,$SQL);
         if($query)
                {
                    $mgs = "Update circular information Successfully"  ;
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                   
                }
                else
                {
                    $mgs = "Update circular information Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
             else:
                $mgs = "This National ID Number is already taken,please try another!";
                $class = "red_color alert alert-warning alert-dismissable col-md-8";
            endif;
}
 ?>
<?php include("link.php"); ?>
         <!-- parent works -->

         <div class="col-1  left" > 
            <ul> <br> <br>
     <h3> TUTOR ACCOUNT</h3><li> </li>
            <li><a href="tutor_homepage.php">Tutor Profile</a></li>
            <li><a  href="reset_password_tutor.php">Reset Password</a></li>
            <li><a href="update_profile_tutor.php">Edit My Profile</a></li>
            <li><a href="edit_circuler_tutor.php">My Circulars</a></li>
            <li><a href="tutor_circular_page.php">Publish new Circular</a></li>
        </ul>


</div>


         <div class="col-2 right"> 
                
             
<br>
<br> 
<h3> Update Your Circular Information</h3>
<?php
    $sql = "SELECT * FROM gen_tutor_circulars WHERE `TUTOR_NO`='$TUTOR_NO' AND `USER_NO`='$USER_NO' ";
  $select_query = mysqli_query($conn,$sql);
  $result = mysqli_fetch_array($select_query);
  
?>
<div style="padding: 40px;border: 1px solid;width: 800px;">
<form class="cmxform form-horizontal " id="" method="post" enctype="multipart/form-data">
<div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
        <div>
                
                <input type="hidden" name="" value=""/>
            </div>
        
<h4>PERSONAL DETAILS</h4>
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
            <label for="DOB" class="control-label col-lg-3">Birth Date</label>
            <div class="col-lg-5">
                <input type="date" class=" form-control"id="DOB" name="DOB" required value="<?php echo strftime('%Y-%m-%d',strtotime($result['DOB'])); ?>" /><br>
                    
            </div>
            
        </div>
             <div class="form-group ">
            <label for="NATIONALITY" class="control-label col-lg-3">Nationality</label>
            <div class="col-lg-5">
                <select class="form-control" name="NATIONALITY" id="NATIONALITY">
                    <option value="-1"> --Select Nationality--</option>
                    <option value="Bangladeshi"<?php if($result['NATIONALITY'] == 'Bangladeshi')  echo 'selected'; ?>>Bangladeshi</option>
                    <option value="Indian"<?php if($result['NATIONALITY'] == 'Indian')  echo 'selected'; ?>>Indian </option>
                
                </select>
                   <span class="error_message" id="error_nationality" style="color: red;" ></span>  
            </div>
            
        </div> 
        <div class="form-group ">
            <label for="NATIONAL_ID_NUM" class="control-label col-lg-3">National Id Number</label>
            <div class="col-lg-5">
                <input type="text" class=" form-control"id="NATIONAL_ID_NUM" name="NATIONAL_ID_NUM" required value="<?=$result['NATIONAL_ID_NUM']?>"/><br>
                    
            </div>
            
        </div>   
        <div class="form-group ">
            <label for="NATIONAL_ID_IMAGE" class="control-label col-lg-3">National ID Photo</label>
            <div class="col-lg-5">
              <!-- <input class="" id="" name="NATIONAL_ID_IMAGE" type="file"   /> --> <img src="upload1/<?=$result['NATIONAL_ID_IMAGE']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"/>
                <input class=" form-control" type="file" id="NATIONAL_ID_IMAGE" name="NATIONAL_ID_IMAGE"  />
            </div>
            <div>
                <input type="hidden" name="NATIONAL_ID_IMAGE" value="<?=$result['NATIONAL_ID_IMAGE']?>"/>
            </div>
        </div>

        <div class="form-group ">
            <label for="SHORT_INFORMATION" class="control-label col-lg-3">Short Details</label>
            <div class="col-lg-5">
                <textarea class="form-control" name="SHORT_INFORMATION"   required><?=$result['SHORT_INFORMATION']?></textarea>
            </div>
         </div> 
          <h4> CURRENT/HIGHEST EDUCATION DETAILS</h4>
         <div class="form-group ">
            <label for="EDUCATION_LEVEL" class="control-label col-lg-3">Educational Level</label>
            <div class="col-lg-5">
                <select class="form-control" name="EDUCATION_LEVEL" id="EDUCATION_LEVEL">
                  
<option value="Doctorate" <?php if($result['EDUCATION_LEVEL'] == 'Doctorate')  echo 'selected'; ?>>Doctorate </option>
<option value="Doctorate(running)"<?php if($result['EDUCATION_LEVEL'] == 'Doctorate(running)')  echo 'selected'; ?>>Doctorate(Running) </option>
<option value="Graduate"<?php if($result['EDUCATION_LEVEL'] == 'Graduate')  echo 'selected'; ?>> Graduate </option>
<option value="Graduation(running)"<?php if($result['EDUCATION_LEVEL'] == 'Graduation(running)')  echo 'selected'; ?>>Graduation(Running)</option>
<option value="Diploma"<?php if($result['EDUCATION_LEVEL'] == 'Diploma')  echo 'selected'; ?>>Diploma</option>
<option value=" Diploma(Running)"<?php if($result['EDUCATION_LEVEL'] == 'Diploma(Running)')  echo 'selected'; ?>>Diploma(Running)</option>
<option value="Higher Secondary"<?php if($result['EDUCATION_LEVEL'] == 'Higher Secondary')  echo 'selected'; ?>>Higher Secondary  </option>
<option value="Secondary"<?php if($result['EDUCATION_LEVEL'] == 'Secondary')  echo 'selected'; ?>>Secondary </option>

                    </select>
                    <span class="error_message" id="error_education" style="color: red;" ></span>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="TUTOR_ID_CARD_IMAGE" class="control-label col-lg-3">Student/Job ID Photo</label>
            <div class="col-lg-5">
             <!--  <input class="" id="" name="TUTOR_ID_CARD_IMAGE" type="file"   /> --> <img src="upload1/<?=$result['TUTOR_ID_CARD_IMAGE']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"/>
                <input class=" form-control"type="file" id="TUTOR_ID_CARD_IMAGE" name="TUTOR_ID_CARD_IMAGE" />
            </div>
            <div>
                <input type="hidden" name="TUTOR_ID_CARD_IMAGE" value="<?=$result['TUTOR_ID_CARD_IMAGE']?>"/>
            </div>
        </div>

<div class="form-group ">
            <label for="SUBJECT" class="control-label col-lg-3">Major/ Group/ Subject</label>
            <div class="col-lg-5">
                <input type="text" class=" form-control"id="SUBJECT" name="SUBJECT" value="<?=$result['SUBJECT']?>"/><br>
                    <span class="error_message" id="error_sub" style="color: red;" ></span>
            </div>
            
        </div>   
        <div class="form-group ">
            <label for="INSTITUTE" class="control-label col-lg-3">Institute</label>
            <div class="col-lg-5">
                <input type="text" class=" form-control"id="INSTITUTE" name="INSTITUTE" value="<?=$result['INSTITUTE']?>"/><br>
                    <span class="error_message" id="error_institute" style="color: red;" ></span>
            </div>
            
        </div> 
        <h4> OTHER DETAILS</h4>  
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
            <label for="STUDENT_LEVEL_NO" class="control-label col-lg-3">Student Level</label>
            <div class="col-lg-5">
                <select class="form-control" name="STUDENT_LEVEL_NO" id="STUDENT_LEVEL_NO">
                    
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
            <label for="SALARY_NO" class="control-label col-lg-3">Expected Tuition Fee/Month </label>
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

        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="update" value="Update" />
                
            </div>
        </div>
                
            </form>  
            </div>     
    
    </div>

    </body>
  
  <script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        $("#error_area").html("&nbsp;");
        $("#error_nationality").html("&nbsp;");
        $("#error_education").html("&nbsp;");
        $("#error_sub").html("&nbsp;");
        $("#error_institute").html("&nbsp;");
        $("#error_schedule").html("&nbsp;");
        $("#error_level").html("&nbsp;");
        $("#error_subject").html("&nbsp;");
        $("#error_salary").html("&nbsp;");
        
        $("#AREA_NO").attr("class","form-control");
        $("#NATIONALITY").attr("class","form-control");
        $("#EDUCATION_LEVEL").attr("class","form-control");
        $("#SUBJECT").attr("class","form-control");
        $("#INSTITUTE").attr("class","form-control");
        $("#TUITION_SCHEDULE_NO").attr("class","form-control");
        $("#STUDENT_LEVEL_NO").attr("class","form-control");
        $("#STUDENT_SUBJECT_NO").attr("class","form-control");
        $("#SALARY_NO").attr("class","form-control");

        var AREA_NO =$("#AREA_NO").val().trim();
        
        if(AREA_NO =="-1") {
            $("#error_area").text("Area Name is required");
            $("#AREA_NO").attr("class","form-control error_input");
            $("#AREA_NO").focus();
            return false;
        }
        var NATIONALITY =$("#NATIONALITY").val().trim();
        
        if(NATIONALITY =="-1") {
            $("#error_nationality").text("Nationality Name is required");
            $("#NATIONALITY").attr("class","form-control error_input");
            $("#NATIONALITY").focus();
            return false;
        }
        var EDUCATION_LEVEL =$("#EDUCATION_LEVEL").val().trim();
        
        if(EDUCATION_LEVEL =="-1") {
            $("#error_education").text("Education Level Name is required");
            $("#EDUCATION_LEVEL").attr("class","form-control error_input");
            $("#EDUCATION_LEVEL").focus();
            return false;
        }

      var SUBJECT =$("#SUBJECT").val().trim();
        
        if(SUBJECT =="") {
            $("#error_sub").text("Subject is required");
            $("#SUBJECT").attr("class","form-control error_input");
            $("#SUBJECT").focus();
            return false;
        }
        var INSTITUTE =$("#INSTITUTE").val().trim();
        
        if(INSTITUTE =="") {
            $("#error_institute").text("Institute is required");
            $("#INSTITUTE").attr("class","form-control error_input");
            $("#INSTITUTE").focus();
            return false;
        }
       
       

    var TUITION_SCHEDULE_NO =$("#TUITION_SCHEDULE_NO").val().trim();
        
        if(TUITION_SCHEDULE_NO =="-1") {
            $("#error_schedule").text("Tuition Schedule Name is required");
            $("#TUITION_SCHEDULE_NO").attr("class","form-control error_input");
            $("#TUITION_SCHEDULE_NO").focus();
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