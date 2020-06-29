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

        <div class="header">
            @include('partials/header') 
            @include('partials/menu')
        </div>
        <div class="row">
            <div class="col-75">
                <div class="container payment">
                        <div class="row">
                            <div class="col-50">
                                <h3>Thành toán hóa đơn</h3>
                                <label for="fname">
                  <span class="glyphicon glyphicon-icon" aria-hidden="true"></span>
                  </label>
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
                                    <?php 
                      $total=0;      
                    foreach($orders as $o)
                    {
                        foreach($o->product as $pro)
                        {
                         $totals = number_format($total+($o->quantity*$pro->price)*(($pro->sale)/100));
                         $ship=number_format(30000);
                        }
                      
                    }
                    ?>
                                    <span class="price">Tổng giá:{{$totals}}đ</span>
                                    <p class="ship">{{$ship}}đ</span>
                                </div>
                                <span class="price"></span>
                            </div>
                        </div>

                </div>
            </div>
        </div>

    </div>
    @include('partials/footer')
</body>

</html>