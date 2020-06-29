<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>shopping cart</title>

</head>

<body>
    <div class="container-fluid" style=" position: relative;margin-top: 79px">
        <div class="header">
            @include('partials/header') @include('partials/menu')
        </div>
        <div class="container">
            <table class="table table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>STT</th>

                        <th>Tên</th>

                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá sản phẩm</th>

                        <th>Xóa</th>
                        <th>Cập nhật</th>
                    </tr>

                </thead>


                <tbody>
                    @foreach ($carts as $cart) @csrf
                    @foreach ($cart->product as $item)
                        
                  
                   
                    <tr>
                        <td>{{$cart->id}}</td>


                       
                        <td>{{$item->name}}</td>

                        <td style="width: 100px"> <img src="{{'/storage/'.$item->image}}" alt="anh" style="width: 100%"> </td>

                        <td>{{number_format($item->price)}}</td>
                        <td><input type="number" value="{{$cart->quantity}}" name="quantity" min="1" id=""></td>
                        <?php
                            $tong=number_format(($cart->quantity*$item->price)*(($item->sale)/100));
                        ?>
                        <td>{{$tong}}</td>

                        <td>

                            <form action="{{'/carts/'.$item->id}}" method="post">
                                @csrf @method("DELETE")
                                <button class="btn btn-danger" type="submit">Xóa</button>
                            </form>
                        </td>
                        <td><button type="submit" class="btn btn-outline-success">Cập nhật</button></td>

                    </tr>

                    @endforeach
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>#</th>
                    </tr>
                </tfoot>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tổng hóa đơn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                      <?php    
                      $total =0;            
                        foreach ($carts as $cal)
                        {    
                            foreach ($cal->product as $product) {
                                $total = $total+($cal->quantity*$product->price)*(($product->sale)/100);  
                            }
                                   
                             
                        }
                        echo "<b>". number_format($total)."đ</b>";
                       
                ?>
                    </td>
                
                    </tr>
                    <tr>
                      
                        <td>    
                        <form action="/payment" method="get">
                                <button class="btn btn-success" type="submit">Thành toán</button>
                            </form>
                          
                                </td>
                             
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>