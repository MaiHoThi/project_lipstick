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
            <div class="container menu" >
                <ul class="list-inline">
            @include('partials/menu')
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-75">
                <div class="container payment">
                        <div class="row">
                            <div class="col-50">
                                <h3 style="color: black">HÓA ĐƠN</h3>
                                @foreach ($orders as $item)
                            <p for="fname">Tên:{{$item->name}}</p>
                            <p for="fname">Email:{{$item->email}}</p>                            
                                <p for="fname">Số điện thoại:{{$item->phone}}</p>                             
                                <p for="fname">Địa chỉ:{{$item->address}}</p>                               
                                @endforeach
                            </div>

                            <div class="col-50">
                                <h3>Thành Toán</h3>
                                <div class="icon-container">
                                    {{-- <?php 
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
                                    <p class="ship">{{$ship}}đ</span> --}}
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