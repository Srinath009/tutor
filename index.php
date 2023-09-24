<!-- include files -->
<?php include_once('conn.php'); ?>
<?php include_once('inc/header.php'); ?>
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">Trust & Quality</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Learn Today - Lead Tomorrow.</p>
              <a href="tutors.php" class="btn get-quote">Registered Tutors</a>
            </div>
            <!-- <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Features</h2>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Latest Technologies</h4>
                <p></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-css3"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Toons Background</h4>
                <p></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-drupal"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Award Winning Design</h4>
                <p></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-trophy"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  <!--Organisations-->
  <section id="organisations" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>65%</h3>
              <p>Say NO!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>20%</h3>
              <p>Says Yes!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="orga-stru">
              <h3>15%</h3>
              <p>Can't Say!!</p>
              <i class="fa fa-male"></i>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-info">
            <hgroup>
              <h3 class="det-txt"> Is inclusive quality education affordable?</h3>
              <h4 class="sm-txt">(Revised and Updated for 2022)</h4>
            </hgroup>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--Faculity member-->
  <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Meet our Excellent Tutors</h2>
          <hr class="bottom-line">
        </div>

    <?php include('conn.php');
      $count = 0;
      $q = "SELECT *,(SELECT name FROM subject WHERE id=teacher.s_id)AS subject FROM teacher ORDER BY id DESC LIMIT 3";
      $result = mysqli_query($con, $q);
      if(mysqli_num_rows($result)>0):
        while($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="http://localhost/tutor/admin/upload/<?=$row['pic']?>" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name">
                <a href="http://localhost/tutor/admin/teacher/show.php?id=<?= $row['id']?>"><?= $row['username']?></a>
              </p>
              <p class="pm-staff-profile-title"><?= $row['qualification']?></p>

              <p class="pm-staff-profile-bio">Have expertise in Subject of <b><?= $row['subject']?></b> </p>
              <p><a href="http://localhost/tutor/admin/apply/apply.php?id=<?= $row['id']?>" class="btn btn-success btn-sm">Apply Link</a></p>
            </div>
          </div>
        </div>
      <?php
        endwhile;
          endif; ?>

      </div>
      <div class="text-center">
        <a href="tutors.php" class="btn btn-default">More Tutors</a>
      </div>
    </div>
  </section>

  <footer id="footer" class="footer">
    <div class="container text-center">

      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©<?=date('Y')?> All rights reserved
      <div class="credits">
        Developed by: <a href="#">IT Students</a>
      </div>
    </div>
  </footer>
  <!--/ Footer-->

<?php include_once('inc/footer.php') ?>