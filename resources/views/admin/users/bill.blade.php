<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="/css/home.css"> --}}
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
table .head{
    background-color: limegreen;
    color: aliceblue;
}
table .body{
    background-color:bisque;
    color: black;
}
th, td {
  padding: 5px;
  text-align: left; 
  
}
p{
    font-family: 'Times New Roman', Times, serif;
    font-size: 15px;
}
    </style>
    <title>View</title>
</head>

<body>
    <div class="container-fluid" style=" position: relative">
        @include('partials/header')
        <div class="container" >
            <div id="viewport">
                @include('partials/category')
                <h1>Hóa đơn đặt hàng</h1>
        <div class="table">
            <table style="width:100%">
                <tr class="head">
                    <th>id</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Sản phẩm</th>
                    <th>Ship hàng</th>
                </tr>
                <tr class="body">
                    @foreach ($customer as $cus)
                    <td>{{$cus->id}}</td> 
                    <td>{{$cus->name}}</td> 
                    <td>{{$cus->email}}</td> 
                    <td>{{$cus->phone}}</td> 
                    <td>{{$cus->address}}</td> 

                 @endforeach
                
                 <td >
                    @foreach ($bills as $item)
                 <p>Ảnh:<img style="height: 50px;" src="{{'/storage/'.$item->image}}" alt=""></p> 
                 <p>Tên:{{$item->name}}</p> 
                 <p>Số lượng{{$item->quantity}}</p>
                 @endforeach
               
                </td> 
            <td>{{ $ship=number_format($cus->ship)}}</td>
                </tr>
                <tr >
                    <td style="background-color:darkseagreen;color: black" colspan="6" rowspan="2">
                        <strong>
                            Thành toán:   
                            <?php 
                            $total=0;      
                          foreach($bills as $pro)
                          {
                             $totals = number_format($cus->ship+$total+($pro->quantity*$pro->price)*(($pro->sale)/100));
                          }
                          echo $totals."đ";
                          ?>
                     
                        </strong></td>
                        <td style="color: black">
                            <form action='{{ "/products/".$cus ->id}}' method="POST" class="group-inline">
                                @csrf @method("DELETE")
                                <button type="submit" style="background-color: red">Xóa</button>
                            </form>
                            <form action='{{ "/products/".$cus ->id}}' method="POST" class="group-inline">
                                @csrf 
                                <button type="submit" style="background-color: green">Xác nhận</button></form>  
                        </td>
                  </tr>
              </table>
                     
                
    </div>
            </div>
        </div>
    </div>
</body>

</html>