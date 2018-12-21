<?php include'header.php'; ?>
<?php 
  $where="";
   if(isset($_POST["search"])){
        $AREA_NO =$_POST['AREA_NO'];
          if($AREA_NO != -1){
            $where.=" AND `gen_parent_circulars`.`AREA_NO` = '$AREA_NO'";
          }
          $STUDENT_SUBJECT_NO =$_POST['STUDENT_SUBJECT_NO'];
          if($STUDENT_SUBJECT_NO != -1){
            $where.=" AND `gen_parent_circulars`.`STUDENT_SUBJECT_NO` = '$STUDENT_SUBJECT_NO'";
          }
          $SALARY_NO =$_POST['SALARY_NO'];
          if($SALARY_NO != -1){
            $where.=" AND `gen_parent_circulars`.`SALARY_NO` = '$SALARY_NO'";
          }
  }
  $page=@$_GET['page'];
                if($page==0||$page==1){
                $page1=0;
              }
              else{
              $page1=($page*4)-4;
            }
   $sql = "SELECT * FROM gen_parent_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_parent_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_parent_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_parent_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_parent_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_parent_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_parent_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
      WHERE `gen_users`.`USER_TYPE_NO`=2 $where  ORDER BY gen_parent_circulars.PARENT_NO DESC LIMIT $page1,4";
         $result = filterTable($sql);
         
if(isset($_REQUEST["sid"])){
 $sid=$_POST["sid"];
    $sql = "SELECT * FROM gen_parent_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_parent_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_parent_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_parent_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_parent_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_parent_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_parent_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
      WHERE PARENT_NO='$sid' ";
         $result = filterTable($sql);
       }
function filterTable($sql){
     include('config/db_connection.php');
  $filter_result = $conn->query($sql);
 return $filter_result;
 
}
?>
<div class="container">
   <div class="row">
      <div class="col-md-4">
<!-- 
         <?php include'search.php'; ?>
         <?php include'sidebar.php'; ?> -->
 <!-- serach for tutor start -->
  <div class="left_sidebar">
      
            <button class="btn btn-primary search_icon"><i class="fa fa-search"></i></button>
            <p class="text-primary search_text">Search For Tuition</p>
         <form action="search_for_tuition.php" method="post">
            <div class="sidebar_search ">
              
            <label for="STUDENT_SUBJECT_NO" >Prefered Subject</label>
            
                <select class="form-control" name="STUDENT_SUBJECT_NO" id="STUDENT_SUBJECT_NO">
                    <option value="-1">--Select Subject--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_student_subjects` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['STUDENT_SUBJECT_NO']?>" ><?=$row['STUDENT_SUBJECT_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>

            
            <div class="sidebar_search">
            <label for="AREA_NO" >Tuition Area</label>
            
                <select class="form-control" name="AREA_NO" id="AREA_NO">
                    <option value="-1">--Select Area--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_areas` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['AREA_NO']?>" ><?=$row['AREA_NAME']?></option>
                        <?php endwhile;?>
                    </select>
            </div>
            <div class="sidebar_search">
            <label for="SALARY_NO" >Salary</label>
            
                <select class="form-control" name="SALARY_NO" id="SALARY_NO">
                    <option value="-1">--Select Salary--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_salarys` where IS_DELETED=0 ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['SALARY_NO']?>" ><?=$row['SALARY_NAME']?></option>
                        <?php endwhile;?>
                    </select>
        </div>
      
            <div class="sidebar_search">
               <div class="filter_search">
                  <button class="btn btn-warning" name="search">Search</button>
               </div>
            </div>
      
         </form>
      </div>
      


<!-- serach for tutor end -->
         <div class="clearfx"></div>
      </div>
      <div class="col-md-8">
         <div class="products-heading products-margin features_center">
            <h3 class="text-uppercase" style=" margin-top: 5px; color: #60a7d4;"> List of Tuitions </h3>
         </div>

     <?php
       while($row =mysqli_fetch_array($result)):
    ?> 
         <div class="col-md-12">
            <div class="product-wide">
               <div class="product-wide-img">
                  <img src="upload/<?=$row['PROFILE_IMAGE']?>" class="img img-responsive" alt="">
               </div>
            
               <div class="product-wide-main">
                  <div class="col-md-6">
                     <div class="product-wide-left">
                        <div class="products-price">
                           <span class="products-price-old"> 
                           </span>
                           <span class="price"><?=$row['CIRCULAR_TITLE']?></span>
                        </div>
                        <div class="products-title"><?=$row['FULL_NAME']?></div>
                        <div class="products-des"></div>
                        <div class="area-title" style="color:#666;">
                           <i class="fa fa-map-marker"> </i><?=$row['AREA_NAME']?>
                        </div>
                        <div class="products-des"><?=$row['STUDENT_LEVEL_NAME']?></div>
                        <div class="area-company"><?=$row['STUDENT_SUBJECT_NAME']?></div> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="product-wide-right">
                        <p class="facilites"><?=$row["TUITION_SCHEDULE_NAME"];?></p>
                        <br clear="all">
                        <p class="facilites"><?=$row["STUDENT_LEVEL_NAME"];?></p>
                        <br clear="all">
                        <p class="facilites"><?=$row["SALARY_NAME"];?></p>
                        <br clear="all">
                        
                     <a href="view_details_tuition.php?sid=<?php echo $row["PARENT_NO"] ?> " class="btn btn-warning text-capitalize center-block" style="width:142px;">
                     view Details </a>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
    <?php endwhile;?>
         
         
         <div class="col-md-12">
            <div class="ct-pagination text-center">
               <ul class="pagination">
                <?php 
                $sql = "SELECT * FROM gen_parent_circulars ";
                     $q = mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($q);
                     $a=$count/4;
                     $a=ceil($a);
                  ?>
                  <!-- <li class="prev disabled"><a href="" onclick="return false;">&lt; previous</a></li> -->
                <?php  for($i=1; $i<=$a; $i++) {  ?>           
                <li ><a href="search_for_tuition.php?page=<?php echo "$i"; ?> "> <?php  echo $i;  ?> </a></li>

               <?php   }  ?> 
                
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include'footer.php'; ?>