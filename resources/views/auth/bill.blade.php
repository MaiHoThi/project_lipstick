<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="/css/home.css"> --}}
    <style>
        table tr td{
            font-family: 'Times New Roman', Times, serif;
            font-size: 15px;
        }
       p{
            font-family: 'Times New Roman', Times, serif;
            font-size: 19px;
        }
    </style>
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
                               
                            </div>

                            <div class="col-50">
                                <h3>Sản phẩm</h3>
                                <div class="icon-container">
                                <table class="table ">
                                    <thead>
                                       
                                        
                                    </thead>
                                    <tbody>
                    
                                        @csrf @foreach ($products as $pro)
                                        <tr>
                                            <td style="height: 50%;"><img  src="{{'/storage/'.$pro ->image}}" alt="image" class="image_table"></td>

                                            <td >{{$pro->name}}</td>
                    
                                            <td>{{number_format($pro->price)}}đ</td>
                                            <td style="color: red">{{$pro->sale}}%</td>
                                            <td>số lượng:{{$pro->quantity}}</td>
                                        </tr>
                                        @endforeach
                                      
                                            <?php 
                                            $total=0;      
                                          foreach($products as $pro)
                                          {
                                               $totals = number_format($total+($pro->quantity*$pro->price)*(($pro->sale)/100));
                                          }
                                          ?>
                                       
                                      
                                    </tbody>
                                </table>
                                <p>Tổng giá: {{$totals}}đ</p>
                                <p>Ship:{{$item->ship}}đ</p>
                                
                                </div>
                           
                            </div>
                           
                        </div>
                        <div style="display: flex;">
                            <form action="{{'/bills/'.$item->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit"  class="btn btn-danger">Hủy đơn hàng</button>
                                </form>
                                @endforeach
                                <a href="/home" style="margin-left: 10px; background-color: blanchedalmond;border: 1px solid red;padding: 10px;border: 25px;text-decoration: none">Tiếp tục mua hàng</a>

                        </div>
                       
                </div>
            </div>
        </div>

    </div>
    @include('partials/footer')
</body>

</html>