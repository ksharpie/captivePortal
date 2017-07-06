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
      @for ($count=0; $count < count($advertisements) ; $count++)
        @if ($count == $initialAdvertisement)
          <li data-target="#myCarousel" data-slide-to="{{ $count }}" class="active"></li>
        @else
          <li data-target="#myCarousel" data-slide-to="{{ $count }}"></li>
        @endif
      @endfor
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      @for ($count=0; $count < count($advertisements) ; $count++)
        @if ($count == $initialAdvertisement)
          <div class="active item">
        @else
          <div class="item">
        @endif
          <img style="1000px" src="{{ $advertisements[$count]->logo_path }}" alt="Los Angeles">
          <div class="carousel-caption">
            <h3>{{ $advertisements[$count]->company_name }}</h3>
            <p>{{ $advertisements[$count]->offer}} {{ $advertisements[$count]->expiry_date}}</p>
          </div>
        </div>
      @endfor
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
    top: 0px;
    right: 0px;
    padding-right: 40px;
    padding-top: 40px;
}

  @media (max-width: 767px) {
  	body {
  		padding-left: 0;
  		padding-right: 0;
  	}
  }
</style>
