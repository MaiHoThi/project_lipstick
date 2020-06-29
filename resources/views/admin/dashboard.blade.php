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

    <title>Admin</title>
</head>
<body>
  <div class="container-fluid"  style=" position: relative">
    @include('partials/header')
    <div id="viewport" >
            @include('partials/category')
      <!-- Content -->
      <div id="content" >
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
                  <img src="/image/quyenru.jpg" alt="Los Angeles" ">
                  <div class="carousel-caption">
                    <h3>QUYẾN RŨ</h3>
                   
                  </div>
                </div>
          
                <div class="item">
                  <img src="/image/quyphai.jpg" alt="Chicago" >
                  <div class="carousel-caption">
                    <h3>QUÝ PHÁI</h3>
                  </div>
                </div>
              
                <div class="item">
                  <img src="/image/catinh.jpg" alt="New York" >
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
        @csrf
        @foreach ($display as $product)
      
    <div class=" col-sm-3" id="product">
        <div class="product_block">
            <div class="product_image">
        <img src="{{'/storage/'.$product ->image}}" alt="avata">
        </div>
        <div class="product_content">
          <span class="sale">{{$product ->sale}}%</span>
            <label >{{$product ->title}}</label>
        </div>
        <div class="product_price">
            <p >{{$product ->price}}đ</p>
        </div>
        <div class="vote">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span class="fa fa-star"></span>
        </div>
        <div class="product_add-t-cart">
            
            <button  type="button" class="btn btn-default">Thêm giỏ hàng</button>
            
        </div>
        </div>
    </div>

    @endforeach
          
       
      </div>
    </div>
       
      </section>
    </div>
</body>
</html>