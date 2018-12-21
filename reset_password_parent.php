
<?php
include("session_function.php");
include('config/db_connection.php');
 $mgs = '';
 $USER_NO =$_SESSION['USER_NO'];
  if(isset($_POST['reset']))
  {
    $OLD_PASS =  md5($_POST['OLD_PASS']);
    $NEW_PASS1 =$_POST['NEW_PASS1'];
    $NEW_PASS2 =$_POST['NEW_PASS2'];
   $sql = "SELECT * FROM `gen_users` WHERE `PASSWORD` = '$OLD_PASS' AND `USER_NO` = '$USER_NO '";
 $query = mysqli_query($conn,$sql);
    $row_count = mysqli_num_rows($query);
    
    if($row_count == 1)
    {
      if(strlen($NEW_PASS1) < 6)
      {
        $mgs = "PASSWORD too short! PASSWORD Length should be at least 6 characters.";
        $class = "red_color";
      } 
      elseif($NEW_PASS1 == $NEW_PASS2)
      {
        $NEW_PASS =md5($NEW_PASS1);
        $sql = "UPDATE `gen_users` SET `PASSWORD`= '$NEW_PASS' WHERE `USER_NO` = '$USER_NO'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
          $mgs = "PASSWORD Change Successfully!";
          $class = "green_color";
        }
        else
        {
          $mgs = "PASSWORD Change Faild!";
          $class = "red_color";
        }
      }
      else
      {
        $mgs = "New PASSWORD does not match!";
        $class = "red_color";
      }
    }
    else
    {
      $mgs = "Old PASSWORD does not match!";
      $class = "red_color"; 
    }
  }
  else
  {
    $class = "";
    $mgs = "";
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

<h2> Reset Passaword</h2>


<br>
<br>
<div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>

    <div class="form-group ">
            <label for="OLD_PASS" class="control-label col-lg-3">Old Password</label>
            <div class="col-lg-5">
                
            <input type="PASSWORD" class=" form-control" name="OLD_PASS"  >
            </div>
            
        </div>
             <div class="form-group ">
            <label for="NEW_PASS1" class="control-label col-lg-3">New Password</label>
            <div class="col-lg-5">
                <input type="PASSWORD" class=" form-control" name="NEW_PASS1"  >
            </div>
            
        </div>   
        <div class="form-group ">
            <label for="NEW_PASS2" class="control-label col-lg-3">Confirm Password</label>
            <div class="col-lg-5">
                 <input type="PASSWORD" class=" form-control"  name="NEW_PASS2" >
            </div>
            
        </div> 
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary"id="reset" name="reset" value="Reset" />
                
            </div>
        </div>
                
            </form>       
                
                

</div>


    </body>
  
  
    