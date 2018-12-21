<?php include 'header.php';?>
<?php $table_heading = "Manage User Contact";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
    <?php
    $tbl_name="gen_contacts";        //your table name
        $targetpage ="manage_user_contact.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "DELETE FROM $tbl_name  WHERE CONTACT_NO = $ID";
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

    $sql = "SELECT * FROM $tbl_name ";
      $result = mysqli_query($conn,$sql);
    ?>
       <div style="overflow: auto">
    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
             <th><center>Full Name</center></th>
             <th><center>Email</center></th>
             <th><center>Phone</center></th>
             <th><center>Subject</center></th>
             <th><center>Message</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><center><?=$row['NAME']?></center></td>
            <td><center><?=$row['EMAIL']?></center></td>
           <td><center><?=$row['PHONE']?></center></td>
           <td><center><?=$row['SUBJECT']?></center></td>
           <td><center><?=$row['MESSAGE']?></center></td>
           
            <td>
               
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['CONTACT_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
</div>

    
    <!---main content end---->
<?php include 'footer.php';?>
