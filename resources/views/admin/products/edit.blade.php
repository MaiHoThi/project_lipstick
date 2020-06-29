<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <title>Editproduct</title>
</head>
<body>
    <div class="container-fluid">
    @include('partials/header')
    <div class="container">
        <div id="viewport" >
            @include('partials/category')
            <!-- Content -->
            <div id="content" >
                <ul class="list-inline list">
                    <li ><a href="/insert">Thêm sản phẩm</a></li>
                    <li ><a href="/view">Xem/Sửa/Xóa sản phấm</a></li>
                </ul>
   <form action="{{'/index/'.$edit->id}}" method="POST" class="form-group" enctype="multipart/form-data"role="form">
    @csrf
    @method("PATCH")
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-group">
        <label for="category_id">Loại sản phẩm</label>

        <select name="category_id"  class="form-control" required="required">
         @foreach ($category as $cate)
         <option value="{{$cate->id}}">{{$cate->name}}</option>
         @endforeach
      </select>
       <div class="form-group">
           <label  for="name">Tên sản phẩm</label>
           <input type="text" class="form-control" name="nameedit"value="{{ $edit->name}}" placeholder="Nhập tên sản phẩm">
       </div>
   
       <div class="form-group">
           <label  for="price">Giá:</label>
           <input type="number" value="{{ $edit->price}}"class="form-control" name="priceedit" placeholder="Nhập giá">
       </div>
       <div class="form-group">
        <label  for="price">Khuyến mãi:</label>
        <input type="number" value="{{ $edit->sale}}"class="form-control" name="saleedit" placeholder="Nhập khuyến mãi(nếu có)">
    </div>
       <div class="form-group">
           <label  for="title">Nhập tình trạng:</label>
           <input type="text" value="{{ $edit->status}}"class="form-control" name="statusedit" placeholder="Nhập tiêu đề">
       </div>
       <div class="form-group">
           <label  for="image">Tải ảnh lên:</label>
           <input type="file"  name="imageedit" >
           <p><img style="width: 50px" src="{{'/storage/'.$edit->image}}" alt=""></p>
       </div>
     

       <div class="form-group">
        <label  for="description">Chi tiết sản phẩm:</label>
        <textarea type="text" aria-valuetext="{{ $edit->description}}" name="description"></textarea>
   
    </div>
   
       <button type="submit" class="btn btn-primary">Sửa</button>
   </form>
   
    </div>
   
    </div>
</body>
</html>