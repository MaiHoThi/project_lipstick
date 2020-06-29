<!DOCTYPE html>
<html lang="en">
        
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User</title>
</head>
<body>

  <div class="container-fluid co"  style=" position: relative; margin-top: 79px">
    <div class="header">
      @include('partials/header')
      @include('partials/menu')
  </div>
    <section >
    <div class="slide">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
      
            <div class="item active">
              <img src="/image/quyenru.jpg" alt="" >
              <div class="carousel-caption">
                <h3>QUYẾN RŨ</h3>
               
              </div>
            </div>
      
            <div class="item">
              <img src="/image/quyphai.jpg" alt="" >
              <div class="carousel-caption">
                <h3>QUÝ PHÁI</h3>
              </div>
            </div>
          
            <div class="item">
              <img src="/image/catinh.jpg" alt="" >
              <div class="carousel-caption">
                <h3>CÁ TÍNH</h3>
               
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
      </div>
    <div class="" style="display: center">
    <div id="viewport" >
  <!-- Content -->
  <div id="content" >
   
    @csrf
    @foreach ($products as $product)
    
<div class=" col-sm-3" id="product">
    <div class="product_block">
      <span><p></p>
      <p></p>
      </span>
        <div class="product_image">
         
          <a href='{{ "/auth/".$product ->id."/detail"}}'>
    <img src="{{'/storage/'.$product ->image}}" alt="avata">
          </a>
    </div>
    <div class="product_content">
        <label >{{$product ->title}}</label>
        <span class="sale">{{$product ->sale}}%</span>
    </div>
    <div class="product_price">
        <p >{{$product->getPrice()}}</p>
    </div>
    <div class="vote">
      <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
    </div>
    <div class="product_add-t-cart">
    <form action='{{"/auth/".$product->id."/cart"}}' method="get">
      @csrf
          <button type="submit" class="btn btn-default">Thêm giỏ hàng</button>
        </form>
      
        
    </div>
    </div>
</div>

@endforeach
      
   
  </div>
</div>
    </div>

  </section>
  </div>
  @include('partials/footer')
</body>
</html>