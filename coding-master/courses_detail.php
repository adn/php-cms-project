<?php
    require("header.php");
    require("admin/DB.php");
    $course_details = $db_object->get_courses();
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
     </div>
    </div><!-- End Breadcrumbs -->

     <!-- ======= Courses Section ======= -->
     <section id="courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

          <?php foreach($course_details as $oneCourse):?>

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="admin/images/<?=$oneCourse['course_image']?>" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><?=$oneCourse['domain']?></h4>
                    <p class="price"><?=$oneCourse['course_fee']?></p>
                  </div>

                  <h3><a href="course-details.html"><?=$oneCourse['course_name']?></a></h3>
                  <p><?php echo substr(trim($oneCourse['description']),0,150) ?></p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                      <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                      <span>Antonio</span>
                    </div>
                    <div class="trainer-rank d-flex align-items-center">
                      <i class="bx bx-user"></i>&nbsp;50
                      &nbsp;&nbsp;
                      <i class="bx bx-heart"></i>&nbsp;65
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- End Course Item-->
          <?php endforeach; ?>  
          

          

        </div>

      </div>
    </section><!-- End Courses Section -->


    <?php require("footer.php"); ?>