
<?php include 'header.php';?>
<?php $table_heading = "Find Tutor";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
 <?php
        $tbl_name="gen_users";        //your table name
        $targetpage = "index.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
   $USER_TYPE_NO= $_SESSION["USER_TYPE_NO"];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    
    
    
    $sql = "SELECT * FROM $tbl_name LEFT JOIN `gen_divisions` 
    ON `gen_divisions`.`DIVISION_NO`=$tbl_name.`DIVISION_NO` WHERE USER_NO='$user_no' AND USER_TYPE_NO='$USER_TYPE_NO'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
  
?>
<div style="padding: 40px;border: 1px solid;width:500px;">
    <table>  
    	<tr><th>Name:</th><th><?=$row['FULL_NAME']?></th></tr>
        <tr><th>Email:</th><th><?=$row['EMAIL']?></th></tr>
        <tr><th>Mobile:</th><th><?=$row['MOBILE']?></th></tr>
        <tr><th>User Name:</th><br><th><?=$row['USER_NAME']?></th></tr>
    
    </table>
</div>


<?php include 'footer.php';?>