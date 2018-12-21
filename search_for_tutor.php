<?php include'header.php'; ?>
<?php 
  $where="";
   if(isset($_POST["search"])){
        $AREA_NO =$_POST['AREA_NO'];
          if($AREA_NO != -1){
            $where.=" AND `gen_tutor_circulars`.`AREA_NO` = '$AREA_NO'";
          }
          $INSTITUTE =$_POST['INSTITUTE'];
          if($INSTITUTE =$_POST['INSTITUTE']){
            $where.=" AND `gen_tutor_circulars`.`INSTITUTE` = '$INSTITUTE'";
          }
          $EDUCATION_LEVEL =$_POST['EDUCATION_LEVEL'];
        if($EDUCATION_LEVEL != -1){
            $where.=" AND `gen_tutor_circulars`.`EDUCATION_LEVEL` = '$EDUCATION_LEVEL'";
          }
  }
   $page=@$_GET['page'];
                if($page==0||$page==1){
                $page1=0;
              }
              else{
              $page1=($page*4)-4;
            }
   $sql = "SELECT * FROM gen_tutor_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_tutor_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_tutor_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_tutor_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_tutor_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_tutor_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_tutor_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
      WHERE `gen_users`.`USER_TYPE_NO`=1  $where ORDER BY gen_tutor_circulars.TUTOR_NO DESC LIMIT $page1,4 ";
         $result = filterTable($sql);
         
if(isset($_REQUEST["sid"])){
 $sid=$_POST["sid"];
    $sql = "SELECT * FROM gen_tutor_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_tutor_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_tutor_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_tutor_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_tutor_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_tutor_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_tutor_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
      WHERE TUTOR_NO='$sid' ";
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
         <form action="search_for_tutor.php" method="post">
            <div class="sidebar_search ">
            <label for="INSTITUTE" >Institute</label>
            
                <input type="text" id="INSTITUTE"  name="INSTITUTE"/><br>
                  <!-- <select class="form-control" name="INSTITUTE" id="INSTITUTE">
                    <option value="-1">--Select Institute--</option>
                        <?php
                            $sql = "SELECT * FROM `gen_tutor_circulars` ";
                            $result1 = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_array($result1)):
                        ?>
                            <option value="<?=$row['INSTITUTE']?>" ><?=$row['INSTITUTE']?></option>
                        <?php endwhile;?>
                    </select> -->  
            
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
            <label for="EDUCATION_LEVEL" >Tutor Educational Level</label>
            
                <select class="form-control" name="EDUCATION_LEVEL" id="EDUCATION_LEVEL">
                    
<option value="-1"> --Select  Educational Level--</option>
<option value="Doctorate">Doctorate</option>
<option value="Doctorate(running)">Doctorate(Running) </option>
<option value="Graduate"> Graduate </option>
<option value="Graduation(running)">Graduation(Running)</option>
<option value="Diploma">Diploma</option>
<option value=" Diploma(Running)">Diploma(Running)</option>
<option value="Higher Secondary">Higher Secondary  </option>
<option value="Secondary">Secondary </option>
                    </select>
                    <span class="error_message" id="error_division" style="color: red;" ></span>
            
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
            <h3 class="text-uppercase" style=" margin-top: 5px; color: #60a7d4;">List of Tutors </h3>
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
                           <span class="price"><?=$row['EDUCATION_LEVEL']?></span>
                        </div>
                        <div class="products-title"><?=$row['FULL_NAME']?></div>
                        <div class="products-des"></div>
                        <div class="area-title" style="color:#666;">
                           <i class="fa fa-map-marker"></i> <?=$row['AREA_NAME']?>
                        </div>
                        <div class="products-des"><?=$row['STUDENT_LEVEL_NAME']?></div>
                        <div class="area-company"><?=$row['INSTITUTE']?></div> 
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="product-wide-right">
                        <p class="facilites"><?=$row["STUDENT_SUBJECT_NAME"];?></p>
                        <br clear="all">
                        <p class="facilites"><?=$row["TUITION_SCHEDULE_NAME"];?></p>
                        <br clear="all">
                        <p class="facilites"><?=$row["SALARY_NAME"];?></p>
                        <br clear="all">
                        
                     <a href="view_details_tutor.php?sid=<?php echo $row["TUTOR_NO"] ?>" class="btn btn-warning text-capitalize center-block" style="width:142px;">
                     view Details
                     </a>
                        <!-- <button class="btn details-btn">View Details</button> -->
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
                $sql = "SELECT * FROM gen_tutor_circulars ";
                     $q = mysqli_query($conn,$sql);
                     $count=mysqli_num_rows($q);
                     $a=$count/4;
                     $a=ceil($a);
                  ?>
                  <!-- <li class="prev disabled"><a href="" onclick="return false;">&lt; previous</a></li> -->
                <?php  for($i=1; $i<=$a; $i++) {  ?>           
                <li ><a href="search_for_tutor.php?page=<?php echo "$i"; ?> "> <?php  echo $i;  ?> </a></li>

               <?php   }  ?> 
                
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include'footer.php'; ?>