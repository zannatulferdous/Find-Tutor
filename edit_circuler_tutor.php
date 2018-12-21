<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];
 
if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $sql = "DELETE FROM `gen_tutor_circulars`  WHERE TUTOR_NO = $id AND `USER_NO`='$USER_NO'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $mgs = "Data Delete Successfully!";
           
        }
        else
        {
            $mgs = "Data Delete Fail!";
            
        }
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

<div class="col-2 right" > 
   <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
   

             <br>
             <br>
             <br>

   <h3> Edit Your Circular Information</h3>
<p <?php if($mgs=='')echo "style='display:none;'" ?>><?php echo $mgs ;?></p>

    <?php
    $sql="SELECT * FROM `gen_tutor_circulars`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_tutor_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_tutor_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_tutor_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_tutor_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_tutor_circulars`.`SALARY_NO`  WHERE `USER_NO`='$USER_NO'";
      $query=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($query)):

  ?>


<div style="padding: 40px;border: 1px solid;width:800px;">
       <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?='edit_circuler_tutor.php'.'?delete='.$row['TUTOR_NO']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
      <br>
       <br>
       <a href="<?='update_circular_tutor.php'.'?edit='.$row['TUTOR_NO']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i> Update</a>
       
       <table  >
        <tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["AREA_NAME"]; ?></td></tr>
        <tr><td> Birth Date:</td> <td><?php echo ""." ".$row["DOB"]; ?></td></tr>
        <tr><td>Nationality:</td> <td><?php echo " "." ".$row["NATIONALITY"]; ?></td></tr>
        <tr><td> National Id Card Number:</td> <td><?php echo " "." ".$row["NATIONAL_ID_NUM"];?></td></tr>
        <tr><td> National Id Card Photo:</td>
         <td><img src="upload1/<?=$row['NATIONAL_ID_IMAGE']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"></td></tr>
        <tr><td>Short Details :</td> <td><?php echo ""." ".$row["SHORT_INFORMATION"];?></td> </tr>
<tr><td> Education Level:</td> <td><?php echo ""." ".$row["EDUCATION_LEVEL"]; ?></td></tr>
<tr><td> Student/Job ID Photo:</td>
         <td><img src="upload1/<?=$row['TUTOR_ID_CARD_IMAGE']?>" height="70" width="70" style="margin-top: 12px; border: 2px solid #555;"></td></tr>
<tr><td> Subject:</td> <td><?php echo ""." ".$row["SUBJECT"]; ?></td></tr>
<tr><td> Institute:</td> <td><?php echo ""." ".$row["INSTITUTE"]; ?></td></tr>
<tr><td> Schedule: </td> <td><?php echo "  "." ".$row["TUITION_SCHEDULE_NAME"]; ?></td></tr>
<tr><td>Student Level:</td> <td><?php echo " "." ".$row["STUDENT_LEVEL_NAME"]; ?></td></tr>
<tr><td>Prefered Subject:</td> <td><?php echo ""." ".$row["STUDENT_SUBJECT_NAME"];?></td> </tr>
<tr><td>Expected Tuition Fee:</td> <td><?php echo ""." ".$row["SALARY_NAME"];?></td> </tr>


  </table>
              
</div>    

<?php endwhile; ?>

    </body>
  
  
    