<?php
include("session_function.php");
include('config/db_connection.php');
 $user_no =$_SESSION['USER_NO'];
 
 $sql = "SELECT * FROM gen_users LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO`
 LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
  WHERE USER_NO='$user_no' ";
      
 $result1 = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result1);
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
             <h3>My Profile </h3>
             <img src="upload/<?=$row['PROFILE_IMAGE']?>" height="130" width="130" style="margin-top: 12px; border: 2px solid #555;"/>
             
</h2><br> 
           
            <!-- <label for="IS_HEAD_OFFICE" class="control-label col-lg-2"> </label>
            <div class="col-lg-4">
                <input type="checkbox" name="IS_HEAD_OFFICE" id="IS_HEAD_OFFICE" > check request
          </div> -->

             <ul>
               <li><br>Full Name :<?php echo " "." ".$row["FULL_NAME"];?></li>
               <li><br>Email address :<?php echo " "." ".$row["EMAIL"]; ?></li>
               <li><br>Phone/Mobile :<?php echo ""." ".$row["MOBILE"]; ?></li>
               <li><br>Division :<?php echo ""." ".$row["DIVISION_NAME"]; ?></li>
               <li><br>District :<?php echo ""." ".$row["DISTRICT_NAME"]; ?></li>
               <li><br>Contact Address :<?php echo ""." ".$row["ADDRESS"];?></li>

               <li><br>Gender:<?php 
                 $GENDER_NO=$row["GENDER_NO"];

               if($GENDER_NO==1) echo "Male";
                elseif($GENDER_NO==2) echo"Female"; 
                ?></li>
             </ul>
    
    </div>

    </body>
  
  
   