<?php include('includes/header.php') ?>
    <!-- Slide gallery -->
    <div class="jumbotron">
      <div class="container">
        <div class="col-xs-12">
        <?php 
          if (isset($_GET['saveMovie'])){
            if ($_GET['saveMovie'] === 'true') {
              echo '<p>Successful add movie</p>';
            }else{
              echo '<p>Fail to add movie</p>';
            }
          }
         ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="img/carousel1.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="img/carousel2.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>
            <div class="item">
              <img src="img/carousel3.jpg" alt="">
              <div class="carousel-caption">
              </div>
            </div>
          </div>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
        </div>
      </div><!-- End Slide gallery -->
    </div>

    <!-- Thumbnails -->
    <div class="container thumbs">
      <?php 
      include('includes/db-connection.php');
      $stmt = $conn -> prepare('
        SELECT * FROM movies');
      $result = $stmt -> execute();
      if($result){
        while ($row = $stmt -> fetch()) {
          $description = truncate($row['description'], 180);
          echo '<div class="col-sm-6 col-md-4">';
          echo '<div class="thumbnail">';
          echo '<img src="'.$row['img_url'].'" alt="'.$row['title'].'" class="img-responsive">';
          echo '<div class="caption">';
          echo ' <h3>'.$row['title'].'</h3>';
          echo '<p>'.$row['type'].'</p>';
          echo '<p>'.$description.'</p>';
         /* echo '<div class="btn-toolbar text-center">';
          echo '<a href="#" role="button" class="btn btn-primary pull-right">Details</a>';*/
          echo '</div></div></div>';
        }

      }else{
        echo '<p>There is error with the database connection</p>';
      }
      ?>
    </div><!-- End Thumbnails -->
    <?php include('includes/footer.php') ?>
