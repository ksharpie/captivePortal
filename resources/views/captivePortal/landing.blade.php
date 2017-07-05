<!DOCTYPE html>
<html lang="en">
<head>
  <title>Captive Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container fill">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="active item">
        <img style="1000px" src="https://garyconklinglifenotes.files.wordpress.com/2014/01/really-big-tree.jpg" alt="Los Angeles">
        <div class="carousel-caption">
          <h3>Los</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="http://www.wallpapersdb.org/wallpapers/world/really_big_city_2560x1600.jpg" alt="Chicago">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>

      <div class="item">
        <img src="https://livelyplanet.ru/uploads/posts/2017-04/1492001895_vankuver-kanada.jpeg" alt="New york">
        <div class="carousel-caption">
          <h3>Los</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div id="fixedbutton">
     <button type="button" class="btn btn-primary">Login</button>
  </div>
</div>

</body>
</html>
<style>
  html,body{
    height:100%;
  }
  .carousel-inner > .item > img {
    width: 100vw;
    height: 100vh;
  }
  .carousel,.item,.active{
    height:100%;
  }
  .carousel-inner{
    height:100%;
  }
  .fill{
    width:100%;height:100%;background-position:center;background-size:cover;
  }
  .container {
    padding-right: 0px;
    padding-left: 0px;
  }
  #fixedbutton {
    position: fixed;
    bottom: 0px;
    right: 0px;
    padding-right: 40px;
    padding-bottom: 40px;
}

  @media (max-width: 767px) {
  	body {
  		padding-left: 0;
  		padding-right: 0;
  	}
  }
</style>
<script>
  // $("#carousel").swipe({
  //
  //   swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
  //
  //     if (direction == 'left') $(this).carousel('next');
  //     if (direction == 'right') $(this).carousel('prev');
  //
  //
  //    },
  //   allowPageScroll:"vertical"
  //
  // });

  $("#myCarousel").on("swipe",function(){

    $(this).carousel('next');

  });
</script>
