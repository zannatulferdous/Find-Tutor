<?php include'header.php'; ?>
<?php 
   include('config/db_connection.php');

   if(isset($_REQUEST["back"])){
  header('location:search_for_tuition.php');
}
    $sid=$_REQUEST["sid"];
    $sql = "SELECT * FROM gen_parent_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_parent_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_parent_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_parent_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_parent_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_parent_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_parent_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
     WHERE PARENT_NO='$sid' ";
    $result = $conn->query($sql);
          $row = $result->fetch_assoc();
?>
<div class="jumbotron">
  <div class="container">  <table><center><p style="width: 800px;color:black;font-weight: bold;">Parent Profile Information</p>  
    <!-- <img src="upload/<?=$row['PROFILE_IMAGE']?>" height="150" width="150" style="margin-top: 12px; border: 2px solid #555;">
       -->    
  </center></table>
     <div style="padding:20px; padding-left:300px;background-color: lightblue;"  align="center">
<table><center>
  <tr>
        <td> <img src="upload/<?=$row['PROFILE_IMAGE']?>" height="150" width="150" style="margin-top: 12px; border: 2px solid #555;">
          <br><br>
          </td>     
 </tr>
 
 <tr><td><h3> Personal Information</h3></td></tr> 
 <tr>
<td>Name: </td> <td><?php echo " "." ".$row["FULL_NAME"];?></td>   </tr>
<tr>
<td>Email: </td> <td><?php echo " "." ".$row["EMAIL"];?></td>   </tr>
<tr><td> Phone number:  </td> <td><?php echo "  "." ".$row["MOBILE"]; ?></td></tr>
<tr><td>Division:</td> <td><?php echo " "." ".$row["DIVISION_NAME"]; ?></td>
</tr>
<tr><td>District:</td> <td><?php echo " "." ".$row["DISTRICT_NAME"]; ?></td>
</tr>
<tr><td> Address :</td> <td><?php echo ""." ".$row["ADDRESS"]; ?></td></tr>
<tr><td>Gender :</td> <td><?php 
                 $GENDER_NO=$row["GENDER_NO"];

               if($GENDER_NO==1) echo "Male";
                elseif($GENDER_NO==2) echo"Female"; 
                ?></td> 
</tr>

<tr><td>Short Information</td> <td><?php echo " "." ".$row["SHORT_DETAILS"]; ?></td>
</tr>

<tr><td><h3> Tuition Details</h3></td></tr>  
<td> Circular For:</td> <td><?php echo " "." ".$row["CIRCULAR_TITLE"];?></td>   </tr>
<tr><td>Medium:</td> <td><?php echo " "." ".$row["MEDIUM"]; ?></td>
</tr>
<td> Prefered Subject:</td> <td><?php echo " "." ".$row["STUDENT_LEVEL_NAME"];?></td>   </tr>
<tr><td>Tuition Area :</td> <td><?php echo " "." ".$row["AREA_NAME"]; ?></td>
</tr>
<td> Week:</td> <td><?php echo " "." ".$row["WEEK"];?></td>   </tr>
<tr><td>Student Number :</td> <td><?php echo " "." ".$row["STUDENT_NUMBER"]; ?></td>
</tr>
<tr><td> Student Subject:</td> <td><?php echo ""." ".$row["STUDENT_SUBJECT_NAME"]; ?></td></tr>
<tr><td> Available Schedule:</td> <td><?php echo ""." ".$row["TUITION_SCHEDULE_NAME"]; ?></td></tr>
<tr><td>Expected Tuition Fee:</td> <td><?php echo ""." ".$row["SALARY_NAME"];?></td> 
</tr>
<tr>
    <td><a href="search_for_tuition.php"><input type="submit" name="back" id="back" value="Back"></a> </td>
</tr></center>
</table>
</div>

  
</div>
    </div>

      



<?php include'footer.php'; ?>