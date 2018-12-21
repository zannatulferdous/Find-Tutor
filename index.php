<?php include'header.php'; ?>
<?php 
   $sql = "SELECT * FROM gen_tutor_circulars 
      LEFT JOIN `gen_users` ON `gen_users`.`USER_NO`=`gen_tutor_circulars`.`USER_NO`
      LEFT JOIN `gen_student_levels` ON `gen_student_levels`.`STUDENT_LEVEL_NO`=`gen_tutor_circulars`.`STUDENT_LEVEL_NO`
      LEFT JOIN `gen_student_subjects` ON `gen_student_subjects`.`STUDENT_SUBJECT_NO`=`gen_tutor_circulars`.`STUDENT_SUBJECT_NO`
      LEFT JOIN `gen_areas` ON `gen_areas`.`AREA_NO`=`gen_tutor_circulars`.`AREA_NO`
      LEFT JOIN `gen_tuition_schedules` ON `gen_tuition_schedules`.`TUITION_SCHEDULE_NO`=`gen_tutor_circulars`.`TUITION_SCHEDULE_NO`
      LEFT JOIN `gen_salarys` ON `gen_salarys`.`SALARY_NO`=`gen_tutor_circulars`.`SALARY_NO`
      LEFT JOIN `gen_divisions` ON `gen_divisions`.`DIVISION_NO`=`gen_users`.`DIVISION_NO` 
      LEFT JOIN `gen_districts` ON `gen_districts`.`DISTRICT_NO`=`gen_users`.`DISTRICT_NO`
      WHERE `gen_users`.`USER_TYPE_NO`=1 ORDER BY gen_tutor_circulars.TUTOR_NO DESC LIMIT 0,6";
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
<!--//top-bar-w3layouts-->
<div class="header">
   <!--Slider-->
   <div class="slider">
      <div class="callbacks_container">
         <ul class="rslides" id="slider3">
           
            <li>
               <div class="slider-img3">
                  <div class="container">
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </div>
   <div class="clearfix"> </div>
   <!-- //Modal1 -->
   <!--//Slider-->
</div>
<!--//Header-->
<!--//conatiner-->

<div class="">
   <div class="conatiner">
      <div class="row">
         <div class="col-md-12">
            <div class="products-heading products-margin features_center">
               <h3 class="text-uppercase" style=" margin-top: 5px; color: #60a7d4;">Latest Premium Tutors</h3>
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-md-12 col-lg-12">
         <?php
       while($row =mysqli_fetch_array($result)):
    ?> 
            <div class="col-md-2 col-lg-2">
               <div class="products-item products-margin products-hover" id="counter">
                  <div class="products-main-content">
                     <a href="#">
                        <div>
                            <cneter><img src="upload/<?=$row["PROFILE_IMAGE"]?>" alt="" class="img-thumbnail property_img" style="height: 105px;width: 93px;margin-left: 51px;margin-top:10px;"></center>
                           
                           <div class="products-main-text">
                              <div class="products-title">
                                 <?=$row['EDUCATION_LEVEL']?>
                              </div>
                              <div class="products-des">
                                  <?=$row['FULL_NAME']?>
                              </div>
                              <div class="area-title" style="color:#666;">

                                 <i class="fa fa-map-marker"></i><?=$row['AREA_NAME']?> 
                              </div>
                              <div class="products-price">
                                 <span class="products-price-old"> 
                                 </span>
                                 <span class="price"><?=$row["TUITION_SCHEDULE_NAME"];?> </span>
                              </div>
                              <div class="products-des" style="height: 42px;">
                                <?=$row["INSTITUTE"];?>                            
                              </div>
                              <div class="area-company">
                                 <?=$row["SALARY_NAME"];?>
                              </div>
                              <a href="view_details_tutor.php?sid=<?php echo $row["TUTOR_NO"] ?>" class="btn btn-warning text-capitalize center-block" style="width:142px;">
                     view Details
                     </a>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <?php endwhile;?>
         </div>
         
      </div>
      
         
   </div>
</div>
<?php include'footer.php'; ?>