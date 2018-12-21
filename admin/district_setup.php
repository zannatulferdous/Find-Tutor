<?php include 'header.php';?>
<?php $table_heading = "district Setup";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
 <?php
        $tbl_name="gen_districts";        //your table name
        $targetpage = "district_setup.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "UPDATE $tbl_name SET `IS_DELETED` = 1,`DELETED_BY` = '$user_no', `DELETED_ON` = '$CURR_TIME' WHERE DISTRICT_NO = $ID";
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
           $DIVISION_NO = trim($_POST['DIVISION_NO']);
           $DISTRICT_NAME = $_POST['DISTRICT_NAME'];
           $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `DIVISION_NO` = '$DIVISION_NO' AND `DISTRICT_NAME` = '$DISTRICT_NAME'  ";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1):
               
               $sql = "INSERT INTO $tbl_name ( `DIVISION_NO` , `DISTRICT_NAME` , `CREATED_BY` , `CREATED_ON` ) VALUES(  '$DIVISION_NO','$DISTRICT_NAME','$user_no', '$CURR_TIME')";
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
            $DIVISION_NO = trim($_POST['DIVISION_NO']);
            $DISTRICT_NAME = $_POST['DISTRICT_NAME'];
            $DISTRICT_NO = $_POST['DISTRICT_NO'];
            $SQL = "SELECT * FROM $tbl_name WHERE `IS_DELETED` = 0 AND `DIVISION_NO` = '$DIVISION_NO' AND `DISTRICT_NAME` = '$DISTRICT_NAME' AND `DISTRICT_NO` != '$DISTRICT_NO'";
            $COUNT = mysqli_num_rows(mysqli_query($conn,$SQL));
            if($COUNT < 1): 
                
                $sql = "UPDATE $tbl_name SET   `DIVISION_NO` = '$DIVISION_NO' ,`DISTRICT_NAME` = '$DISTRICT_NAME'  , `IS_UPDATED` = 1, `UPDATED_BY` = '$user_no' ,`UPDATED_ON` = '$CURR_TIME'  WHERE DISTRICT_NO = $DISTRICT_NO";
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
        $sql = "SELECT * FROM $tbl_name WHERE `DISTRICT_NO` = '$id' ";
        $result = mysqli_fetch_array(mysqli_query($conn,$sql));
    ?>
     <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data" >
     <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            <div>
                <input type="hidden" name="DISTRICT_NO" value="<?=$result['DISTRICT_NO']?>" />
            </div>
        </div>
        
      <div class="form-group ">
            <label for="DIVISION_NO" class="control-label col-lg-3">Division </label>
            <div class="col-lg-5">
                <select class="form-control" name="DIVISION_NO" id="DIVISION_NO">
                    <option value="-1">--Select Division--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_divisions` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['DIVISION_NO']?>" <?php if($result['DIVISION_NO'] == $row['DIVISION_NO'])  echo 'selected'; ?>><?=$row['DIVISION_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_division" style="color: red;" ></span>
            </div>
            
        </div>
        <div class="form-group ">
            <label for="DISTRICT_NAME" class="control-label col-lg-3">District Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="DISTRICT_NAME" name="DISTRICT_NAME" type="text" value="<?=$result['DISTRICT_NAME']?>"  />
                <span class="error_message" id="error_district" style="color: red;" ></span> 
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

    <form class="cmxform form-horizontal " id="signupForm" method="post" enctype="multipart/form-data">
        <div class="form-group " <?php if($mgs=='')echo "style='display:none;'" ?>>
            <div class=" col-md-6 col-md-offset-2 <?=$class?>"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><?=$mgs?></div>
            
        </div>
       
        <div class="form-group ">
            <label for="DIVISION_NO" class="control-label col-lg-3">Division </label>
            <div class="col-lg-5">
                <select class="form-control" name="DIVISION_NO" id="DIVISION_NO">
                    <option value="-1">--Select Division--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_divisions` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['DIVISION_NO']?>"><?=$row['DIVISION_NAME']?></option>
                        <?php endwhile;?>
                    </select>
                    <span class="error_message" id="error_division" style="color: red;" ></span>
            </div>
            
        </div>
        
        
        <div class="form-group ">
            <label for="DISTRICT_NAME" class="control-label col-lg-3">District Name </label>
            <div class="col-lg-5">
                <input class=" form-control" id="DISTRICT_NAME" name="DISTRICT_NAME" type="text"   />
                <span class="error_message" id="error_district" style="color: red;" ></span>
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
    
    
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=$tbl_name.`DIVISION_NO`  WHERE $tbl_name.`IS_DELETED` = 0  ";
    $result = mysqli_query($conn,$sql);
    
   
?>

    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Division</center></th>
            <th><center>District Name</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><?=$row['DIVISION_NAME']?></td>
            <td><?=$row['DISTRICT_NAME']?></td>
           <td>
               <center> <a onclick="return confirm('Are you Sure Want to Edit?');" href="<?=$targetpage.'?edit='.$row['DISTRICT_NO']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['DISTRICT_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>



<?php include 'footer.php';?>
<script type="text/javascript">

$(document).ready(function(){
    $("#submit").on("click",function(){
        
        $("#error_division").html("&nbsp;");
        $("#error_district").html("&nbsp;");
        $("#DIVISION_NO").attr("class","form-control");
        $("#DISTRICT_NAME").attr("class","form-control");
        
      
        var DIVISION_NO = $("#DIVISION_NO").val().trim();
        
        if(DIVISION_NO == "-1") {
            $("#error_division").text("Division is required");
            $("#DIVISION_NO").attr("class","form-control error_input");
            $("#DIVISION_NO").focus();
            return false;
        }
        
    var DISTRICT_NAME = $("#DISTRICT_NAME").val().trim();
        
        if(DISTRICT_NAME == "") {
            $("#error_district").text("District is required");
            $("#DISTRICT_NAME").attr("class","form-control error_input");
            $("#DISTRICT_NAME").focus();
            return false;
        }

         });
    });  
</script>