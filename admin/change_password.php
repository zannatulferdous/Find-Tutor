<?php include 'header.php';?>
<?php $table_heading = "Change password";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
<?php 
$mgs = '';
 $USER_NO =$_SESSION['user_no'];
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

     <form class="cmxform form-horizontal " id="signupForm" method="post" action="" >
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
                                
<?php include 'body-bottom.php';?>
<?php include 'footer.php';?>
