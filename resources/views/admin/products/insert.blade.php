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
    <title>insertproduct</title>
</head>

<body>
    <div class="container-fluid" style=" position: relative">
        @include('partials/header')

        <div class="container">
            <div id="viewport">
                @include('partials/category')
                <!-- Content -->
                <div id="content">
                    <ul class="list-inline list">
                        <li ><a href="/insert">Thêm sản phẩm</a></li>
                        <li ><a href="/view">Xem/Sửa/Xóa sản phấm</a></li>
                    </ul>
                    <form action="/products/insert" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category_id">Loại sản phẩm</label>

                            <select name="category_id" id="input" class="form-control" required="required">
                                @foreach ($cate as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                          </select>

                        </div>
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm" value="{{old('name')}}">
                        </div>

                        <div class="form-group">
                            <label for="price">Giá:</label>
                            <input type="number" class="form-control" name="price" placeholder="Nhập giá" value="{{old('price')}}">
                        </div>
                        <div class="form-group">
                            <label for="sale">Khuyến mãi:</label>
                            <input type="number" min="0"  value="0" class="form-control" value="{{old('sale')}}" name="sale" placeholder="Nhập khuyến mãi(nếu có)">
                        </div>
                        <div class="form-group">
                            <label for="status">Tình trạng:</label>
                            <input type="text"  class="form-control" name="status" placeholder="Nhập tình trạng">
                        </div>
                        <div class="form-group">
                            <label for="image">Tải ảnh lên:</label>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label for="description">Chi tiết:</label>
                            <textarea type="text" id="description" name="description" aria-valuetext="{{old('description')}}"></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
               </div>
            </div>
        </div>
    </div>

</body>

</html>