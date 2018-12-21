<?php include 'header.php';?>
<?php $table_heading = "Area Setup";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
 <?php
        $tbl_name="gen_areas";        //your table name
        $targetpage = "area_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `is_deleted` = 1 ,`deleted_by` = '$user_no', `deleted_on` = '$CURR_TIME' WHERE AREA_NO = $ID";
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
           $AREA_NAME = trim($_POST['AREA_NAME']);
           
          $SQL = "SELECT * FROM $tbl_name WHERE `is_deleted` = 0 AND `AREA_NAME` = '$AREA_NAME'   ";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
              $sql = "INSERT INTO $tbl_name ( `AREA_NAME` , `created_by` , `created_on`) VALUES('$AREA_NAME', $user_no, '$CURR_TIME')";
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
            $AREA_NAME = trim($_POST['AREA_NAME']);
            
         
           $AREA_NO = $_POST['AREA_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `is_deleted` = 0 AND `AREA_NAME` = '$AREA_NAME'   AND `AREA_NO` != '$AREA_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1): 
                $sql = "UPDATE $tbl_name SET   `AREA_NAME` = '$AREA_NAME' ,  `is_updated` = 1, `updated_by` = $user_no ,`updated_on` = '$CURR_TIME'  WHERE AREA_NO = $AREA_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `AREA_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($conn,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post"enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="AREA_NO" value="<?=$result['AREA_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name</label>
            <div class="col-lg-5">
                <input class=" form-control" id="AREA_NAME" name="AREA_NAME" type="text" value="<?=$result['AREA_NAME']?>" required />
            <span class="error_message" id="error_area" style="color: red;" ></span> 
            </div>
            
        </div>

      
         
        <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="btnAdd" name="update" value="Update" />
                
            </div>
        </div>
    </form>
    
    <?php
        else:
    ?>

    <form class="cmxform form-horizontal " id="signupForm" method="post"  enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
        <div class="form-group ">
            <label for="AREA_NAME" class="control-label col-lg-3">Area Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="AREA_NAME" name="AREA_NAME" type="text" />
                <span class="error_message" id="error_area" style="color: red;" ></span> 
            </div>
            
        </div>
       
       <div class="form-group">
            <div class="col-lg-offset-3 col-md-offset-2 col-sm-offset-3 col-xs-offset-3 col-lg-5">
                <input type="submit" class="btn btn-primary" id="btnAdd" name="submit" value="Add" />
                
            </div>
        </div>
    </form>
    
    <?php
        endif;
    

    $sql = "SELECT * FROM $tbl_name 
         WHERE $tbl_name.is_deleted = 0 ";
    $result = mysqli_query($conn,$sql);
    
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
             <th><center>Are Name</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><center><?=$row['AREA_NAME']?></center></td>
           
           
            <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['AREA_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['AREA_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
    
    <!---main content end---->
<?php include 'footer.php';?>

<script type="text/javascript">

$(document).ready(function(){
    $("#btnAdd").on("click",function(){
        $("#error_area").html("&nbsp;");
        $("#AREA_NAME").attr("class","form-control");
    

       var AREA_NAME =$("#AREA_NAME").val().trim();
        
        if(AREA_NAME =="") {
            $("#error_area").text("Area Name is required");
            $("#AREA_NAME").attr("class","form-control error_input");
            $("#AREA_NAME").focus();
            return false;
        }
      
 });
    });
          
</script>