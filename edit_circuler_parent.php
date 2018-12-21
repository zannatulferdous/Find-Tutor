<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];
 
if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        $sql = "DELETE FROM `gen_parent_circulars`  WHERE PARENT_NO = $id AND `USER_NO`='$USER_NO'";
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
     <h3> PARENT ACCOUNT</h3><li> </li>
     <li> <a href="parent_homepage.php">Parent Profile</a></li>
            <li><a href="reset_password_parent.php">Reset Password</a></li>
            <li><a href="update_profile_parent.php">Edit My Profile</a></li>
            <li><a href="edit_circuler_parent.php">My Circulars</a></li>
            <li><a href="parent_circular_page.php">Publish new Circular</a></li>
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
    $sql="SELECT * FROM `gen_parent_circulars`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_parent_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_parent_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_parent_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_parent_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_parent_circulars`.`SALARY_NO`  WHERE `USER_NO`='$USER_NO'";
      $query=mysqli_query($conn,$sql);
      while($row=mysqli_fetch_array($query)):

  ?>


<div style="padding: 40px;border: 1px solid;width:800px;">
       <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?='edit_circuler_parent.php'.'?delete='.$row['PARENT_NO']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
      <br>
       <br>
       <a href="<?='update_circular_parent.php'.'?edit='.$row['PARENT_NO']?>" class="btn btn-danger" style="float: right;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i> Update</a>
       
       <table  >
        <tr><td> Circular Title:</td> <td><?php echo ""." ".$row["CIRCULAR_TITLE"]; ?></td></tr>
        <tr><td>Medium:</td> <td><?php echo " "." ".$row["MEDIUM"]; ?></td>
</tr>
<tr><td>Prefered Subject:</td> <td><?php echo ""." ".$row["STUDENT_SUBJECT_NAME"];?></td> 
</tr>
<tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["AREA_NAME"]; ?></td>
</tr>
<tr><td>Student Level:</td> <td><?php echo " "." ".$row["STUDENT_LEVEL_NAME"]; ?></td>
</tr>
<tr><td> Schedule </td> <td><?php echo "  "." ".$row["TUITION_SCHEDULE_NAME"]; ?></td></tr>

<tr><td> Week:</td> <td><?php echo " "." ".$row["WEEK"];?></td>   </tr>

<tr><td> Student Number:</td> <td><?php echo ""." ".$row["STUDENT_NUMBER"]; ?></td></tr>
<tr><td>Expected Tuition Fee :</td> <td><?php echo ""." ".$row["SALARY_NAME"];?></td> 
</tr>
<tr><td>Short Details :</td> <td><?php echo ""." ".$row["SHORT_DETAILS"];?></td> 
</tr>

  </table>
              
            </div>    

<?php endwhile; ?>

    </body>
  
  
    