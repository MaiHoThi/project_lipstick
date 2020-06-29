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
    <div class="container-fluid" style="">

    <div class="header">
        @include('partials/header')
        @include('partials/menu')
    </div><center>
            <div style="width: 40%"> 
   <form action="/auth/login" method="POST" class="login100-form " role="form" >
   @csrf
   <label for="">ĐĂNG NHẬP</label>
       <div class="form-group">
         
           <input type="email" name="email" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off" autofocus="">

       </div>
   
       <div class="form-group">
           
           <input type="password" name="password" class="input-full" placeholder="password" autocorrect="off" autocapitalize="off" autofocus="">
       </div>
       <div class="checkbox-w3">
        <span class="check-w3"><input type="checkbox" />Remember Me</span>
        <a href="#">Forgot Password?</a>
        <div class="clear"></div>
    </div>
   	<p style="color: red;">{{Request::get('error')}}</p>
 
       <button type="submit" class="btn btn-primary">Đăng nhập</button>
      
   </form>
   <form action="/register" method="get">
    <button type="submit" class=" form-control btn btn-danger">Đăng ký</button>
    </form>
    
</div>  
</center>
</div>
        @include('partials/footer')
</body>
</html>