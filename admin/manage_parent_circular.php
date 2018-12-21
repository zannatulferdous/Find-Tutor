<?php include 'header.php';?>
<?php $table_heading = "Manage parent circular";?>
<?php include 'sidebar.php';?>
<?php include 'body-top.php';?>
    <?php
    $tbl_name="gen_parent_circulars";        //your table name
        $targetpage ="manage_parent_circular.php";  //your file name  (the name of this file)
    $user_no =$_SESSION['user_no'];
    $CURR_TIME = date('Y-m-d H:i:s'); 
        $mgs = '';
    if(isset($_GET['delete']))
    {
        $ID = $_GET['delete'];
        $sql = "DELETE FROM $tbl_name  WHERE PARENT_NO = $ID";

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


    /* 
       First get total number of rows in data table. 
       If you have a WHERE clause in your query, make sure you mirror it here.
    */
       $adjacents = 3;
    $query = "SELECT COUNT(*) as num FROM $tbl_name ";
    $total_pages = mysqli_fetch_array(mysqli_query($conn,$query));
    $total_pages = $total_pages['num'];
    
    /* Setup vars for query. */
    $limit = 15; 
    if(isset($_GET['page']))
    {                               //how many items to show per page
        $page = $_GET['page'];
    }
    else
    $page = 1;
    
    if($page) 
        $start = ($page - 1) * $limit;          //first item to display on this page
    else
        $start = 0;                             //if no page var is given, set start to 0
    
    /* Get data. */
    $sql = "SELECT * FROM $tbl_name 
    LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_parent_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_parent_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_parent_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_parent_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_parent_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_parent_circulars`.`SALARY_NO`
      LIMIT $start, $limit";
    $result = mysqli_query($conn,$sql);
    
    /* Setup page vars for display. */
    if ($page == 0) $page = 1;                  //if no page var is given, default to 1.
    $prev = $page - 1;                          //previous page is page - 1
    $next = $page + 1;                          //next page is page + 1
    $lastpage = ceil($total_pages/$limit);      //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;                      //last page minus 1
    
    /* 
        Now we apply our rules and draw the pagination object. 
        We're actually saving the code to a variable in case we want to draw it more than once.
    */
    $pagination = "";
    if($lastpage > 1)
    {   
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1) 
            $pagination.= "<a href=\"$targetpage?page=$prev\"><< previous</a>";
        else
            $pagination.= "<span class=\"disabled\"><< previous</span>";    
        
        //pages 
        if ($lastpage < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
        {   
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
                if ($counter == $page)
                    $pagination.= "<span class=\"current\">$counter</span>";
                else
                    $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
            }
        }
        elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
        {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))        
            {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
                $pagination.= "...";
                $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
            }
            //close to end; only hide early pages
            else
            {
                $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                $pagination.= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                }
            }
        }
        
        //next button
        if ($page < $counter - 1) 
            $pagination.= "<a href=\"$targetpage?page=$next\">next >></a>";
        else
            $pagination.= "<span class=\"disabled\">next >></span>";
        $pagination.= "</div>\n";       
    }
?>
       <div style="overflow: auto">
    <table   class="table table-bordered table-hover table-responsive table-condensed table-striped dataTable col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
        <tr>
            <th><center>Sl</center></th>
            <th><center>Circular Title</center></th>
             <th><center>Medium</center></th>
             <th><center>Area Name</center></th>
             <th><center>Student Level Name</center></th>
             <th><center>Student Subject Name</center></th>
             <th><center>Tuition Schedule Name</center></th>
             <th><center>Salary Name</center></th>
            <th><center>Week</center></th>
            <th><center>Student Number</center></th>
            <th><center>Short Details</center></th>
            <th><center>Action</center></th>
         </tr>
    <?php $i=$page*$limit-$limit+1; while($row = mysqli_fetch_array($result)):?>
        <tr>
            <td><center><?=$i++?></center></td>
            <td><center><?=$row['CIRCULAR_TITLE']?></center></td>
           <td><center><?=$row['MEDIUM']?></center></td>
            <td><center><?=$row['AREA_NAME']?></center></td>
           <td><center><?=$row['STUDENT_LEVEL_NAME']?></center></td>
           <td><center><?=$row['STUDENT_SUBJECT_NAME']?></center></td>
           <td><center><?=$row['TUITION_SCHEDULE_NAME']?></center></td>
           <td><center><?=$row['SALARY_NAME']?></center></td>
           <td><center><?=$row['WEEK']?></center></td>
           <td><center><?=$row['STUDENT_NUMBER']?></center></td>
           <td><center><?=$row['SHORT_DETAILS']?></center></td>
            <td>
              
                <a onclick="return confirm('Are you Sure Want to Delete?');" href="<?=$targetpage.'?delete='.$row['PARENT_NO']?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></center>
            </td>
        </tr>
    <?php endwhile;?>
    </table>
</div>

<?=$pagination?>
    
    <!---main content end---->
<?php include 'footer.php';?>
