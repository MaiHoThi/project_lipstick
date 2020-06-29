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
        @include('partials/menu')
    </div>
    <div class="row">
        <div class="col-75">
          <div class="container payment">
            <form action="/action_page.php">
      
              <div class="row">
                <div class="col-50">
                  <h3>Thành toán hóa đơn</h3>
                  <label for="fname"><i class="fa fa-user"></i> Họ và tên:</label>
                  <input type="text" id="fname" name="name" placeholder="Nhập họ và tên">
                  <label for="email"><i class="fa fa-envelope"></i> Email</label>
                  <input type="text" id="email" name="email" placeholder="Đăng nhập email">
                  <label for="email"><i class="fa fa-envelope"></i> Số điện thoại</label>
                  <input type="text" id="phone" name="phone" placeholder="Đăng nhập số điện thoại">
                  <label for="adr"><i class="fa fa-address-card-o"></i> Địa chỉ</label>
                  <input type="text" id="adr" name="address" placeholder="Nhập đỉa chỉ">
                </div>
      
                <div class="col-50">
                  <h3>Thành Toán</h3>
                  <div class="icon-container">
                             
                  
                  <span class="price">Tổng giá:{{Request::get($totals)}}đ</span>
                    <p class="ship">Ship: 30.000dd</span>
                  </div>
                  <label for="cname">Mã giảm giá</label>
                  <input type="text" id="cname" name="code" placeholder="Nhập mã giảm giá nếu có"><button type="submit"></button>
                  <span class="price">Tổng giá: 130.000đ</span>
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