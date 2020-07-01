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
    <title>Login</title>
</head>
<body>
    <div class="container-fluid" >

    <div class="header">
        @include('partials/header')
        <div class="container menu" >
            <ul class="list-inline">
        @include('partials/menu')
            </ul>
        </div>
    </div>
   
            <div class="container"> 
                <form action="/auth/register" method="POST"  role="form" class="login100-form ">
                    @csrf
                    <label for="">ĐĂNG KÝ</label>
                        <div class="form-group">
                            <label class="" for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Đăng nhập email">
                        </div>
                    
                        <div class="form-group">
                            <label class="" for="password">Mật khẩu:</label>
                            <input type="password" class="form-control" name="password" placeholder="Đăng nhập mất khẩu">
                        </div>
                        <div class="form-group">
                            <label class="" for="name">Họ và tên:</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-group">
                            <label class="" for="birthday">Ngày sinh:</label>
                            <input type="date"  name="birthday" min="1964-01-01" max="2010-12-31" value="{{old('birthday')}}">
                        </div>
                      
                        <div class="form-group">
                            <label class="" for="password">Giới tính:</label>
                            <select class="form-control" id="gender" name="gender">
                       <option>nam</option>
                       <option>nữ</option>
                       
                     </select>
                        </div>
                        <p style="color: red;">{{Request::get('error')}}</p>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                    </form>
                 
                 
</div>  
</div>
        @include('partials/footer')
</body>
</html>