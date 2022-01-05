<?php
  $course_detail = $db_object->get_courses();

?>
<!-- ======= Popular Courses Section ======= -->
    <section id="popular-courses" class="courses">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Courses</h2>
          <p>Popular Courses</p>
        </div>

        <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <?php foreach($course_detail as $oneCourse): ?>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <img src="admin/images/<?=$oneCourse['course_image']?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4><?=strtoupper($oneCourse['domain'])?></h4>
                  <p class="price"><?=$oneCourse['course_fee']?></p>
                </div>

                <h3><a href="course-details.html"><?=$oneCourse['course_name']?></a></h3>
                <p>Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="admin/images/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span><?=$oneCourse['name']?></span>
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
    </section><!-- End Popular Courses Section -->