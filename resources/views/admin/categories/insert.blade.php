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
    <title>Categories</title>
</head>

<body>
    <div class="container-fluid" style=" position: relative">
        @include('partials/header')

        <div class="container">
            <div id="viewport">
                @include('partials/category')
                <!-- Content -->
                <div id="content">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <ul class="list-inline list">
                        <li><a href="/insert">Thêm Các sản phẩm</a></li>
                    </ul>
                    <section>
                    <form action="/categories/insert" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên loại sản phẩm" value="{{old('name')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </section>
                <section  style="padding-top: 30px">
                    <b>Bảng danh sách các loại sản phẩm</b>
                   
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Loại</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cate)
                            <tr>
                            <td>{{$cate->id}}</td>
                                <td>{{$cate->name}}</td>
                                <td>
                                    <form action='{{ "/categories/".$cate ->id."/edit"}}' method="GET" class="group-inline">
                                        <button type="submit">Sửa</button></form>
                                </td>
                                <td>
                                    <form action='{{ "/delecategory/".$cate ->id}}' method="POST" class="group-inline">
                                        @csrf @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Xóa</button></form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
                
                </div>
            </div>
        </div>
    </div>

</body>

</html>