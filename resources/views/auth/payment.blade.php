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
    <title>Thanhtoan</title>
</head>
<body>
    <div class="container-fluid" style="">

    <div class="header" >
        @include('partials/header')
        <div class="container menu" >
          <ul class="list-inline">
        @include('partials/menu')
          </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-75">
          <div class="container payment">
            <form action="/bills" method="post"  enctype="multipart/form-data" >
      @csrf
              <div class="row">
                <div class="col-50">
                  <h3>Thành toán hóa đơn</h3>
                  <label for="fname"><i class="fa fa-user"></i> Họ và tên:</label>
                  <input type="text" id="fname" name="name" placeholder="Nhập họ và tên">
                  @error('name')
                  <div class="alert alert-success">{{ $message }}</div>
                  @enderror
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="Đăng nhập email">
                  @error('email')
                  <div class="alert alert-success">{{ $message }}</div>
                  @enderror
                  <label for="email"><i class="fa fa-envelope"></i> Số điện thoại</label>
                  <input type="text" id="phone" name="phone" placeholder="Đăng nhập số điện thoại">
                  @error('phone')
                  <div class="alert alert-success">{{ $message }}</div>
                  @enderror
                  <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                  <input type="text" id="adr" name="address" placeholder="Nhập đỉa chỉ">
                  @error('address')
                  <div class="alert alert-success">{{ $message }}</div>
                  @enderror
                </div>
      
                <div class="col-50">
                  <h3>Thành Toán</h3>
                  <div class="icon-container">
                    <?php
                    $tong =0;
                    foreach ($orders as $cart){
                      foreach ($cart->product as $item){
                        $tong= $tong + ($cart->quantity*$item->price)*(($item->sale)/100);  
                      }
                    }  
                    $ship=30000;  
                    $total=$tong+$ship;                 
                   ?>
                    <span class="price">Tạm tính:{{number_format($tong)}}đ</span>
                    <p class="ship">{{$ship}}đ</span>
                  </div>
                  <label for="cname">Mã giảm giá</label>
                  <input type="text" id="cname" name="code" placeholder="Nhập mã giảm giá nếu có"><button type="submit"></button>
                <p class="price" style="color: red">Tổng giá:{{number_format($total)}}đ</p>
                </div>
              </div>
              <label>
                <input type="checkbox" checked="checked" name="sameadr"> Ship trực tiếp
              </label>
                       <input type="submit" value="Đặt hàng" class="btn order">             
            </form>
          </div>
        </div>
      </div> 

</div>
        @include('partials/footer')
</body>
</html>