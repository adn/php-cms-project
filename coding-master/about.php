<?php
  require("admin/DB.php");
  $about_detail = $db_object->get_about();
?>
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>About Us</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="admin/images/<?=$about_detail['about_image']?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3><?=$about_detail['title']?></h3>
            <p class="font-italic">
            <?=$about_detail['description']?>-
            </p>
            
            <a href="about.html" class="learn-more-btn">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->