<?php include 'header.php';?>
<?php $table_heading = "Tuition Schedule Setup";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
 <?php
        $tbl_name="gen_tuition_schedules";        //your table name
        $targetpage ="tuition_schedule_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `is_deleted` = 1 ,`deleted_by` = '$user_no', `deleted_on` = '$CURR_TIME' 
        WHERE TUITION_SCHEDULE_NO = $ID";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $mgs = "Data Delete Successfully!";
            $class = "green_color alert alert-success col-md-6 alert-dismissable";
        }
        else
        {
            $mgs = "Data Delete Fail!";
            $class = "red_color alert alert-warning alert-dismissable col-md-6";
        }
    }
    if(isset($_POST['submit']))
    {
           $TUITION_SCHEDULE_NAME = trim($_POST['TUITION_SCHEDULE_NAME']);
           
          $SQL = "SELECT * FROM $tbl_name WHERE `is_deleted` = 0 AND `TUITION_SCHEDULE_NAME` = '$TUITION_SCHEDULE_NAME'   ";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
              $sql = "INSERT INTO $tbl_name ( `TUITION_SCHEDULE_NAME` , `created_by` , `created_on`) VALUES('$TUITION_SCHEDULE_NAME', $user_no, '$CURR_TIME')";
                $result = mysqli_query($conn,$sql);
                if($result)
                {
                    $mgs = "Data Insert Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Insert Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6 alert alert-warning alert-dismissable col-md-6";
            endif;
    }
    if(isset($_POST['update']))
    {
            $TUITION_SCHEDULE_NAME = trim($_POST['TUITION_SCHEDULE_NAME']);
            
         
           $TUITION_SCHEDULE_NO = $_POST['TUITION_SCHEDULE_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `is_deleted` = 0 AND `TUITION_SCHEDULE_NAME` = '$TUITION_SCHEDULE_NAME'   AND `TUITION_SCHEDULE_NO` != '$TUITION_SCHEDULE_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1): 
                $sql = "UPDATE $tbl_name SET   `TUITION_SCHEDULE_NAME` = '$TUITION_SCHEDULE_NAME' ,  `is_updated` = 1, `updated_by` = $user_no ,`updated_on` = '$CURR_TIME'  WHERE TUITION_SCHEDULE_NO = $TUITION_SCHEDULE_NO";
                $result = mysqli_query($conn,$sql);
                if($result)
                {
                    $mgs = "Data Update Successfully!";
                    $class = "green_color alert alert-success col-md-6 alert-dismissable";
                }
                else
                {
                    $mgs = "Data Update Fail!";
                    $class = "red_color alert alert-warning alert-dismissable col-md-6";
                }
            else:
                $mgs = "Duplicate Entry!";
                $class = "red_color alert alert-warning alert-dismissable col-md-6";
            endif;
    }
?> 
    <?php
        if(isset($_GET['edit'])):
        $id = $_GET['edit'];
        $sql = "SELECT * FROM $tbl_name WHERE `TUITION_SCHEDULE_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($conn,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="TUITION_SCHEDULE_NO" value="<?=$result['TUITION_SCHEDULE_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="TUITION_SCHEDULE_NAME" class="control-label col-lg-3">Tuition Schedule</label>
            <div class="col-lg-5">
                <input class=" form-control" id="TUITION_SCHEDULE_NAME" name="TUITION_SCHEDULE_NAME" type="text" value="<?=$result['TUITION_SCHEDULE_NAME']?>" required />
            <span class="error_message" id="error_schedule" style="color: red;" ></span> 
            </div>
            
        </div>

      
         
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
    <?php
        else:
    ?>

    <form class="cmxform form-horizontal " id="signupForm" method="post" >
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
        <div class="form-group ">
            <label for="TUITION_SCHEDULE_NAME" class="control-label col-lg-3">Tuition Schedule </label>
            <div class="col-lg-5">
                <input class=" form-control" id="TUITION_SCHEDULE_NAME" name="TUITION_SCHEDULE_NAME" type="text" />
                <span class="error_message" id="error_schedule" style="color: red;" ></span> 
            </div>
            
        </div>

       
       
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary"  id="submit"name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
    
    $sql = "SELECT * FROM $tbl_name 
         WHERE $tbl_name.is_deleted = 0       
               ";
    $result = mysqli_query($conn,$sql);
    
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
             <th><center>Tuition Schedule</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><center><?=$row['TUITION_SCHEDULE_NAME']?></center></td>
           
           
            <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['TUITION_SCHEDULE_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['TUITION_SCHEDULE_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
    
    <!---main content end---->
<?php include 'footer.php';?>
<script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        $("#error_schedule").html("&nbsp;");
        $("#TUITION_SCHEDULE_NAME").attr("class","form-control");
    

       var TUITION_SCHEDULE_NAME =$("#TUITION_SCHEDULE_NAME").val().trim();
        
        if(TUITION_SCHEDULE_NAME =="") {
            $("#error_schedule").text("Tuition Schedule Name is required");
            $("#TUITION_SCHEDULE_NAME").attr("class","form-control error_input");
            $("#TUITION_SCHEDULE_NAME").focus();
            return false;
        }
      
 });
    });
          
</script>