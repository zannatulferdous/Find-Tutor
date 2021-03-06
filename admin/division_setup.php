<?php include 'header.php';?>
<?php $table_heading = "Division Setup";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
 <?php
        $tbl_name="gen_divisions";        //your table name
        $targetpage = "division_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1 ,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE DIVISION_NO = $ID";
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
           $DIVISION_NAME = trim($_POST['DIVISION_NAME']);
           $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `DIVISION_NAME` = '$DIVISION_NAME'  ";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name ( `DIVISION_NAME` , `CREATED_BY` , `CREATED_ON`) VALUES(  '$DIVISION_NAME','$user_no', '$CURR_TIME')";
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
            $DIVISION_NAME = trim($_POST['DIVISION_NAME']);
            $DIVISION_NO = $_POST['DIVISION_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `DIVISION_NAME` = '$DIVISION_NAME'  AND `DIVISION_NO` != '$DIVISION_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET   `DIVISION_NAME` = '$DIVISION_NAME' , `IS_UPDATED` = 1, `UPDATED_BY` = '$user_no' ,`UPDATED_ON` = '$CURR_TIME'  WHERE DIVISION_NO = $DIVISION_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `DIVISION_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($conn,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="DIVISION_NO" value="<?=$result['DIVISION_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="DIVISION_NAME" class="control-label col-lg-3">Division Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="DIVISION_NAME" name="DIVISION_NAME" type="text" value="<?=$result['DIVISION_NAME']?>" required />
            <span class="error_message" id="error_division" style="color: red;" ></span>
            </div>
            
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary"id="submit" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
    <?php
        else:
    ?>

    <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
        <div class="form-group ">
            <label for="DIVISION_NAME" class="control-label col-lg-3">Division Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="DIVISION_NAME" name="DIVISION_NAME" type="text"  />
                <span class="error_message" id="error_division" style="color: red;" ></span>
            </div>
            
        </div>
        
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
    
    $sql = "SELECT * FROM $tbl_name  WHERE $tbl_name.`IS_DELETED` = 0 ";
    $result = mysqli_query($conn,$sql);
   
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Division Name</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['DIVISION_NAME']?></td>
            <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['DIVISION_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['DIVISION_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>

<?php include 'footer.php';?>
<script type="text/javascript">
$(document).ready(function(){
    $("#submit").on("click",function(){
        
        $("#error_division").html("&nbsp;");
        $("#DIVISION_NAME").attr("class","form-control");
        
        
    var DIVISION_NAME = $("#DIVISION_NAME").val().trim();
        
        if(DIVISION_NAME == "") {
            $("#error_division").text("Division is required");
            $("#DIVISION_NAME").attr("class","form-control error_input");
            $("#DIVISION_NAME").focus();
            return false;
        }

         });
    });  
</script>