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
    <title>View</title>
</head>

<body>
    <div class="container-fluid" style=" position: relative">
        @include('partials/header')
        <div class="container" >
            
            <div id="viewport">
                @include('partials/category')
        <div class="table-responsive">

            <ul class="list-inline sort">
                <li ><a href="/sort/price">Sắp xếp tăng dần</a></li>
                <li ><a href="/sortDesc/price">Sắp xếp giảm dần</a></li>
            </ul>
          <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Khuyến mãi</th>
                        <th>Tổng giá</th>
                        <th>Sửa </th>
                        <th>Xóa </th>

                    </tr>
                </thead>
                <tbody>

                    @csrf @foreach ($products as $item)
                    <tr>
                        <td>{{$item->id}}</td>

                        <td>{{$item->category->name}}</td>

                        <td>{{$item->name}}</td>
                        <td style="width: 50px;height: 100px;"><img  src="{{'/storage/'.$item ->image}}" alt="image" class="image_table"></td>
                        <td>{{$item->getPrice()}}</td>
                        <td style="color: red">{{$item->sale}}%</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <form action='{{ "/index/".$item ->id."/edit"}}' method="GET" class="group-inline">
                                <button type="submit">Sửa</button></form>
                        </td>
                        <td>
                            <form action='{{ "/products/".$item ->id}}' method="POST" class="group-inline">
                                @csrf @method("DELETE")
                                <button type="submit">Xóa</button></form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
            </div>
        </div>
    </div>
</body>

</html>